<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class KatalogPesanan extends Pivot
{
    protected $table = 'katalog_pesanan';
    protected $fillable = ['katalog_id', 'pesanan_id', 'status_pesanan_id', 'qty'];

    public function status_pesanan()
    {
        return $this->belongsTo(StatusPesanan::class);
    }

    public function katalog()
    {
        return $this->belongsTo(Katalog::class);
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
