<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihan';
    protected $fillable = ['pesanan_id', 'total_harga', 'voucher_diskon_id', 'status_pembayaran_id', 'nama_pembayar', 'metode_pembayaran_id'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function diskon()
    {
        return $this->belongsTo(VoucherDiskon::class, 'voucher_diskon_id')
            ->withDefault([
                'nama' => 'Tidak menggunakan voucher diskon',
                'diskon' => '0',
            ]);
    }

    public function status_pembayaran()
    {
        return $this->belongsTo(StatusPembayaran::class);
    }

    public function metode_pembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class);
    }
}
