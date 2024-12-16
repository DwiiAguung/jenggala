<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
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
                'nama' => 'Admin',
                'email' => 'admin@jenggala.com',
                'password' => Hash::make('123'),
                'role' => 'Admin'
            ],
            [
                'nama' => 'Barista',
                'email' => 'barista@jenggala.com',
                'password' => Hash::make('123'),
                'role' => 'Barista'
            ],
        ];

        foreach ($data as $item) {
            User::create($item);
        }
    }
}
