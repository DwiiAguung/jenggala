<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPesanan extends Model
{
    use HasFactory;

    protected $table = 'status_pesanan';
    protected $fillable = ['status'];
    public $timestamps = false;

    public function katalog_pesanan()
    {
        return $this->hasMany(KatalogPesanan::class);
    }
}
