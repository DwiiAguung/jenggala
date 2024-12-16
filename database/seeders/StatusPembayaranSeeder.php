<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\StatusPembayaran;

class StatusPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['status' => 'Menunggu Pembayaran'],
            ['status' => 'Pembayaran Berhasil'],
        ];

        foreach ($data as $item) {
            StatusPembayaran::create($item);
        }
    }
}
