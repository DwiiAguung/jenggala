<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Customer\PesananController;
use App\Http\Controllers\Pengelola\PesananController as PengelolaPesananController;
use App\Http\Controllers\Pengelola\KatalogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('guest.main');
})->name('guest.main');

require __DIR__ . '/auth.php';

// Route customer
Route::middleware(['auth', 'customer'])
    ->name('customer.')
    ->group(function () {
        Route::get('/pesanan', [PesananController::class, 'viewPesanan'])
            ->name('pesanan');
    });

// Route non customer (pengelola)
Route::middleware(['auth', 'pengelola'])
    ->name('pengelola.')
    ->prefix('pengelola')
    ->group(function () {
        Route::get('/dashboard', function () {
            $active = 'dashboard';
            return view('pengelola.dashboard', [
                'active' => $active,
            ]);
        })->name('dashboard');

        Route::get('pesanan', [PengelolaPesananController::class, 'index'])
            ->name('pesanan');

        Route::resource('katalog', KatalogController::class);
    });
