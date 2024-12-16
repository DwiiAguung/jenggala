<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Katalog;
use App\Models\Kategori;

class Product extends Component
{
    public $listProduk, $cart, $kategori;

    protected $listeners = [
        'deleteCheckout',
        'deleteAllCheckout',
        'filterKategori' => 'filter'
    ];

    public function mount()
    {
        $this->listProduk = Katalog::all();
        $this->kategori = null;
        // jika ada session, assign $cart dgn session
        if (session()->has('productInCart')) {
            $this->cart = session('productInCart');
        } else {
            $this->cart = [];
        }
    }

    public function render()
    {
        return view('livewire.product');
    }

    public function addToCart(Katalog $modelId)
    {
        if ($modelId->stok === 0) {
            return false;
        }

        // Jika user belum pernah menambahkan katalog
        if (array_key_exists($modelId->id, $this->cart) == false) { // qty = 1
            $qty = 1;
        } else { // jika user sebelumnya sudah pernah menambahkan katalog
            $qty = $this->cart[$modelId->id]['qty'] + 1; // qty + 1
        }

        // Assign Data
        $this->cart[$modelId->id] = [
            'model' => $modelId,
            'qty' => $qty,
        ];

        // Set Session
        session(['productInCart' => $this->cart]);

        $this->emit('productAddedToCart', session('productInCart'));
    }

    public function deleteCheckout($data)
    {
        $this->cart = $data;
    }

    public function deleteAllCheckout()
    {
        $this->cart = [];
    }

    public function filter($kategori)
    {
        $model = Kategori::where('id', $kategori)->firstOr(function () {
            return null;
        });

        if ($kategori && $model) {
            $this->listProduk = Katalog::where('kategori_katalog_id', $kategori)->get();
        } else {
            $this->listProduk = Katalog::all();
        }
    }
}
