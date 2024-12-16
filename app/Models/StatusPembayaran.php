<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPembayaran extends Model
{
    use HasFactory;

    protected $table = 'status_pembayaran';
    protected $fillable = ['status'];
    public $timestamps = false;

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }
}
