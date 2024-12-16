<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherDiskon extends Model
{
    use HasFactory;

    protected $table = 'voucher_diskon';
    protected $fillable = ['nama', 'diskon', 'stok', 'minimal_pembelian_total_harga'];
    public $timestamps = false;

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }
}
