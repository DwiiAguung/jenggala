<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;

    protected $table = 'katalog';
    protected $fillable = ['nama', 'harga', 'stok', 'gambar', 'deskripsi', 'kategori_katalog_id'];

    public $jumlahHarga = 0;

    public function pesanan()
    {
        return $this->belongsToMany(Pesanan::class)
            ->using(KatalogPesanan::class)
            ->withPivot('status_pesanan_id', 'qty')
            ->withTimestamps();
    }

    public function jumlah_harga()
    {
        $this->jumlahHarga = $this->pivot->qty * $this->harga;
        return $this->jumlahHarga;
    }
}
