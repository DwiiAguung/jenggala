<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    public function index()
    {
        $active = 'orders';

        return view('pengelola.orders', [
            'active' => $active,
        ]);
    }
}
