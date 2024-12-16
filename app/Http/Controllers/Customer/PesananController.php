<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PesananController extends Controller
{
    public function viewPesanan()
    {
        // $pesanan = auth()->user()->pesanan;
        $pesanan = auth()->user()->pesanan()
            // ->whereRelation('tagihan', 'status_pembayaran_id', '=',)
            ->get();

        // dd($pesanan);

        return view('guest.pesanan', [
            'pesanan' => $pesanan,
        ]);
    }
}
