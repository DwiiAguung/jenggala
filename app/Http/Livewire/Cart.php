<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $productAtCart, $totalHarga;
    protected $listeners = ['productAddedToCart' => 'added'];

    public function mount()
    {
        if (session()->has('productInCart')) {
            $this->productAtCart = session('productInCart');
            $this->totalHarga = $this->priceCalculate();
        } else {
            $this->productAtCart = [];
            $this->totalHarga = 0;
        }
    }

    public function priceCalculate()
    {
        $hargaPerItem = null;
        $hargaTotal = 0;

        foreach ($this->productAtCart as $key => $value) {
            $hargaPerItem = $value['model']['harga'] * $value['qty'];
            $hargaTotal += $hargaPerItem;
        }

        return $hargaTotal;
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function added($product)
    {
        $this->productAtCart = $product;
        $this->totalHarga = $this->priceCalculate();
    }

    public function deleteCheckout($id)
    {
        unset($this->productAtCart[$id]);
        $this->emit('deleteCheckout', $this->productAtCart);
        session(['productInCart' => $this->productAtCart]);
        $this->totalHarga = $this->priceCalculate();
    }

    public function deleteAllCheckout()
    {
        $this->productAtCart = [];
        $this->totalHarga = 0;
        $this->emit('deleteAllCheckout');
        session()->forget('productInCart');
    }
}
