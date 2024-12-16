<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\StatusPesanan;

class StatusPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['status' => 'Pesanan Tertunda'],
            ['status' => 'Pesanan Sedang Proses'],
            ['status' => 'Pesanan Selesai'],
        ];

        foreach ($data as $item) {
            StatusPesanan::create($item);
        }
    }
}
