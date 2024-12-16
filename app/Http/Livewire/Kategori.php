<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Kategori as KategoriModel;

class Kategori extends Component
{
    public $kategoriAll;

    public function mount()
    {
        $this->kategoriAll = KategoriModel::all();
    }

    public function render()
    {
        return view('livewire.kategori');
    }
}
