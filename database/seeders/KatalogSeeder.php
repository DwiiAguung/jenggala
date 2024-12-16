<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Katalog;

class KatalogSeeder extends Seeder
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
                'nama' => 'Kopi Susu',
                'harga' => 12000,
                'stok' => 10,
                'kategori_katalog_id' => 2,
            ],
            [
                'nama' => 'Vanilla Latte',
                'harga' => 15000,
                'stok' => 10,
                'kategori_katalog_id' => 2,
            ],
            [
                'nama' => 'Milo Kopi Susu',
                'harga' => 17000,
                'stok' => 0,
                'kategori_katalog_id' => 2,
            ],
            [
                'nama' => 'Steak',
                'harga' => 20000,
                'stok' => 10,
                'kategori_katalog_id' => 1,
            ],
            [
                'nama' => 'Mie Goreng',
                'harga' => 10000,
                'stok' => 10,
                'kategori_katalog_id' => 1,
            ],
            [
                'nama' => 'Sosis',
                'harga' => 7000,
                'stok' => 10,
                'kategori_katalog_id' => 1,
            ],
        ];

        foreach ($data as $item) {
            Katalog::create($item);
        }
    }
}
