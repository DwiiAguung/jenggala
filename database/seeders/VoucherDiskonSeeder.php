<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\VoucherDiskon;

class VoucherDiskonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama' => 'Voucher 1',
                'diskon' => 10000,
                'stok' => 10,
                'minimal_pembelian_total_harga' => 50000
            ],
            [
                'nama' => 'Voucher 2',
                'diskon' => 1000,
                'stok' => 10,
                'minimal_pembelian_total_harga' => 20000
            ],
            [
                'nama' => 'Voucher 3',
                'diskon' => 20000,
                'stok' => 1,
                'minimal_pembelian_total_harga' => 100000
            ],
        ];

        foreach ($data as $item) {
            VoucherDiskon::create($item);
        }
    }
}
