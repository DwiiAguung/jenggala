<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $fillable = ['nama', 'no_meja', 'user_id'];

    public function katalog()
    {
        return $this->belongsToMany(Katalog::class)
            ->using(KatalogPesanan::class)
            ->withPivot('status_pesanan_id', 'qty')
            ->withTimestamps();
    }

    public function tagihan()
    {
        return $this->hasOne(Tagihan::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }
}
