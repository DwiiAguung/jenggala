<?php

namespace App\Http\Livewire\Barista;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

use App\Models\KatalogPesanan;

class Pesanan extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $filterStatus = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function searching()
    {
        if ($this->search == '') {
            $pesanan = KatalogPesanan::orderBy('created_at', 'desc')->paginate(10);
        } else {
            $pesanan = KatalogPesanan::whereHas('pesanan', function (Builder $query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('no_meja', 'like', '%' . $this->search . '%');
            })
                ->orWhereHas('katalog', function (Builder $query) {
                    $query->where('nama', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('status_pesanan', function (Builder $query) {
                    $query->where('status', 'like', '%' . $this->search . '%');
                })
                ->orWhere('qty', 'like', '%' . $this->search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return $pesanan;
    }

    public function render()
    {
        $pesananTertunda = KatalogPesanan::where('status_pesanan_id', 1)->count();
        $pesananProses = KatalogPesanan::where('status_pesanan_id', 2)->count();
        $pesananBerhasil = KatalogPesanan::where('status_pesanan_id', 3)->count();
        $seluruhPesanan = KatalogPesanan::all()->count();
        $pesanan = $this->searching();

        return view('livewire.barista.pesanan', [
            'pesanan' => $pesanan,
            'pesananTertunda' => $pesananTertunda,
            'pesananProses' => $pesananProses,
            'pesananBerhasil' => $pesananBerhasil,
            'seluruhPesanan' => $seluruhPesanan,
        ]);
    }

    public function dispatchEvent($event, $type, $pesan, $icon)
    {
        $this->dispatchBrowserEvent($event, [
            'type' => $type,
            'message' => $pesan,
            'icon' => $icon,
        ]);
    }

    public function setPesananProses(KatalogPesanan $data)
    {
        $cekOtorisasi = Gate::inspect('updatePesananProses', $data);
        if (!$cekOtorisasi->allowed()) {
            $this->dispatchEvent(
                'alert',
                'warning',
                $cekOtorisasi->message(),
                'fa fa-exclamation mr-1'
            );
            return;
        }

        $data->status_pesanan_id = 2;
        $data->save(); // simpan
        $this->dispatchEvent(
            'alert',
            'info',
            'Semangat yaa bikininnya',
            // 'Pesanan Siap Diproses',
            'fa fa-info-circle mr-1'
        );
    }

    public function setPesananBerhasil(KatalogPesanan $data)
    {
        $cekOtorisasi = Gate::inspect('updatePesananSelesai', $data);
        if (!$cekOtorisasi->allowed()) {
            $this->dispatchEvent(
                'alert',
                'warning',
                $cekOtorisasi->message(),
                'fa fa-exclamation mr-1'
            );
            return;
        }

        $data->status_pesanan_id = 3; // ubah menjadi selesai
        $data->save(); // simpan
        $this->dispatchEvent(
            'alert',
            'success',
            // 'Pesanan Telah Selesai Diproses',
            'Udah jadi yaa',
            'fa fa-check mr-1'
        );
    }
}
