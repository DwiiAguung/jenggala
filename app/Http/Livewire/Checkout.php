<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Validator;

use App\Models\VoucherDiskon;
use App\Models\Pesanan;
use App\Models\Tagihan;
use App\Models\Katalog;
use App\Models\MetodePembayaran;

class Checkout extends Component
{
    use AuthorizesRequests;

    public $showModalBox;
    public $cart, $totalHarga, $hargaFix;
    public $nama, $no_meja, $nama_pembayar,
        $metode_pembayaran, $metode_pembayaran_selected, $keterangan;
    public $isUseVoucher, $voucherDiskon, $isCanUseVoucher, $isVoucherAvailable,
        $totalHargaAfterDiskon, $hargaDiskon, $voucherDiskonSelected;

    protected $listeners = ['showModalBox' => 'showModalBox'];
    protected $rules = [
        'cart' => 'required|array',
        'cart.*.qty' => 'lte:cart.*.model.stok',
        'nama' => ['required', 'regex:/^[a-zA-Z\s]*$/'],
        'no_meja' => 'required|integer',
        'hargaDiskon' => 'nullable|lte:totalHarga',
        'hargaFix' => 'required',
        'voucherDiskonSelected' => 'nullable|exists:App\Models\VoucherDiskon,id',
        'isCanUseVoucher' => 'exclude_if:voucherDiskonSelected,null|accepted',
        'isVoucherAvailable' => 'exclude_if:voucherDiskonSelected,null|accepted',
        'nama_pembayar' => ['required', 'regex:/^[a-zA-Z\s]*$/'],
        'metode_pembayaran_selected' => 'required|exists:App\Models\MetodePembayaran,id',
        'keterangan' => 'nullable'
    ];

    protected $messages = [
        'cart.*.qty.lte' => 'Stok :attribute tidak mencukupi',
        'voucherDiskonSelected.exists' => 'Hanya bisa menggunakan voucher yang tersedia pada database',
        'nama.required' => 'Nama harus diisi',
        'nama.regex' => 'Nama hanya boleh mengandung huruf',
        'no_meja.required' => 'Nomor meja harus diisi',
        'no_meja.integer' => 'Nomor meja hanya mengandung angka',
        'hargaDiskon.lte' => 'Harga diskon tidak boleh melebihi total harga',
        'isCanUseVoucher.accepted' => 'Harga diskon hanya bisa digunakan sesuai minimal pembelian',
        'isVoucherAvailable.accepted' => 'Stok untuk voucher ini telah habis',
        'nama_pembayar.required' => 'Nama pembayar harus diisi',
        'nama_pembayar.regex' => 'Nama pembayar hanya boleh mengandung huruf',
        'metode_pembayaran_selected.required' => 'Metode pembayaran harus diisi',
    ];

    public function mount()
    {
        $this->cart = [];
        $this->totalHarga = null;
        $this->voucherDiskon = VoucherDiskon::whereNotIn('stok', [0])->get();
        $this->isUseVoucher = false;
        $this->isCanUseVoucher = false;
        $this->isVoucherAvailable = false;
        $this->metode_pembayaran = MetodePembayaran::all();
        $this->nama = null;
        $this->no_meja = null;
        $this->nama_pembayar = null;
        $this->keterangan = null;
        $this->metode_pembayaran_selected = null;
        $this->voucherDiskonSelected = null;
        $this->showModalBox = false;
    }

    public function showModalBox($data)
    {
        $cart = [];
        foreach ($data[0] as $dt) {
            $cart[$dt['model']['nama']] = $dt;
        }
        $this->cart = $cart;
        $this->totalHarga = $data[1];

        if ($this->isUseVoucher) {
            $this->hargaFix = $this->totalHargaAfterDiskon;
        } else {
            $this->hargaFix = $this->totalHarga;
        }

        $this->openModalBox();
    }

    public function openModalBox()
    {
        $this->showModalBox = true;
    }

    public function closeModalBox()
    {
        $this->showModalBox = false;
        $this->reset([
            'nama', 'no_meja', 'voucherDiskonSelected', 'nama_pembayar',
            'metode_pembayaran_selected', 'keterangan', 'isUseVoucher',
            'isVoucherAvailable'
        ]);

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.checkout');
    }

    public function pesan()
    {
        $otorisasi = Gate::inspect('create', Pesanan::class);

        if (!$otorisasi->allowed() && $otorisasi->code() == 403) {
            return abort($otorisasi->code(), $otorisasi->message());
        }

        if (!$otorisasi->allowed() && $otorisasi->code() == 401) {
            return redirect()->route('login-google');
        }

        $this->withValidator(function (Validator $validator) {
            $validator->setImplicitAttributesFormatter(function ($a) {
                return explode('.', $a)[1];
            });
        })->validate();

        // create data di table pesanan (nama, no meja)
        $pesanan = Pesanan::create([
            'nama' => $this->nama,
            'no_meja' => $this->no_meja,
            'user_id' => auth()->user()->id,
        ]);

        if ($pesanan) {
            // create data di table katalog_pesanan (katalog_id, pesanan_id, qty)
            foreach ($this->cart as $katalog) {
                $pesanan->katalog()->attach($katalog['model']['id'], [
                    'qty' => $katalog['qty'],
                ]);

                // Kurangi stok
                $katalogModel = Katalog::find($katalog['model']['id']);
                $katalogModel->stok -= $katalog['qty'];
                $katalogModel->save();
            }

            // create data di table tagihan 
            $tagihan = new Tagihan([
                'total_harga' => $this->hargaFix,
                'voucher_diskon_id' => $this->voucherDiskonSelected,
                'nama_pembayar' => $this->nama_pembayar,
                'metode_pembayaran_id' => $this->metode_pembayaran_selected,
                'keterangan'    => $this->keterangan ?? null,
                'status_pembayaran_id' => 2,
            ]);

            $pesanan->tagihan()->save($tagihan);

            // jika menggunakan diskon, kurangi stoknya karena sudah dipakai
            if ($this->voucherDiskonSelected) {
                $voucherDiskon = VoucherDiskon::firstWhere('id', $this->voucherDiskonSelected);
                $voucherDiskon->stok -= 1;
                $voucherDiskon->save();
            }

            // delete session('addProductCart')
            session()->forget('productInCart');

            // set flash message
            session()->flash('pesananAdded', 'Pemesanan Berhasil.');

            return redirect()->route('guest.main');
        }
    }

    public function updateTotalHarga($model)
    {
        $model = VoucherDiskon::where('id', $model)->firstOr(function () {
            return null;
        });

        if ($model) {

            if ($this->totalHarga >= $model->minimal_pembelian_total_harga) {
                $this->isCanUseVoucher = true;
            } else {
                $this->isCanUseVoucher = false;
            }

            if ($model->stok == 0) {
                $this->isVoucherAvailable = false;
            } else {
                $this->isVoucherAvailable = true;
            }

            $this->isUseVoucher = true;
            $this->hargaDiskon = $model->diskon;
            $this->voucherDiskonSelected = $model->id;
            $this->totalHargaAfterDiskon = $this->totalHarga - $this->hargaDiskon;
            $this->hargaFix = $this->totalHargaAfterDiskon;
        } else {
            $this->isUseVoucher = false;
            $this->isCanUseVoucher = false;
            $this->isVoucherAvailable = false;
            $this->hargaFix = $this->totalHarga;
            $this->voucherDiskonSelected = null;
        }
    }
}
