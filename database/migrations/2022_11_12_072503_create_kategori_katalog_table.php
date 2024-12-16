<?php

use App\Models\Kategori;
use Database\Seeders\KategoriSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriKatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_katalog', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('icon');
        });

        Artisan::call('db:seed', [
            '--class' => KategoriSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_katalog');
    }
}
