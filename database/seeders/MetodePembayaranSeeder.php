<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MetodePembayaran;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'Bank Transfer'],
            ['nama' => 'Gopay'],
            ['nama' => 'Dana'],
            ['nama' => 'ShopeePay'],
        ];

        foreach ($data as $item) {
            MetodePembayaran::create($item);
        }
    }
}
