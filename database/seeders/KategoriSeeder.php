<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Kategori;

class KategoriSeeder extends Seeder
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
                'nama' => 'Makanan',
                'icon' => 'fa fa-fish',
            ],
            [
                'nama' => 'Minuman',
                'icon' => 'fa fa-coffee',
            ],
        ];

        foreach ($data as $item) {
            Kategori::create($item);
        }
    }
}
