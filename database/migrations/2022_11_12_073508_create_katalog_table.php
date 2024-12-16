<?php

use Database\Seeders\KatalogSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katalog', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('gambar')->nullable();
            $table->string('deskripsi')->nullable();
            $table->foreignId('kategori_katalog_id')
                ->constrained('kategori_katalog')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
            $table->unique(['nama', 'harga']);
        });

        Artisan::call('db:seed', [
            '--class' => KatalogSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('katalog');
    }
}
