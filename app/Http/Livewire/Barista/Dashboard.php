<?php

namespace App\Http\Livewire\Barista;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

use App\Models\Tagihan;
use App\Models\Pesanan;

class Dashboard extends Component
{
    /**
     * 1.   a href pending orders mengarah ke sidebar menu orders yang isinya semua pesanan
     * 2.   a href nama pada latest transaction mengarah ke order (per orangan berdasarkan tagihan)
     *      Jadi sekali klik 1 nama maka akan muncul banyak pesanan sesuai id tagihan yg di klik
     * 2.1  Menu transaksi ada filter berdasarkan nama, tanggal, bulan orderBy terbaru paginate 10
     */

    public function render()
    {
        $latestOrder = Tagihan::latest()->limit(10)->get();
        $ordersToday = count(Pesanan::whereDate('created_at', Carbon::today())->get());
        $earningToday = Tagihan::whereDate('created_at', Carbon::today())->get()->sum('total_harga');
        $pendingOrders = Pesanan::whereHas('katalog', function (Builder $query) {
            $query->where('status_pesanan_id', 1)
                ->orWhere('status_pesanan_id', 2);
        })->get();

        return view('livewire.barista.dashboard', [
            'latestOrder' => $latestOrder,
            'ordersToday' => $ordersToday,
            'earningToday' => $earningToday,
            'pendingOrders' => count($pendingOrders),
        ]);
    }
}
