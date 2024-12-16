<?php

use Database\Seeders\VoucherDiskonSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherDiskonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_diskon', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('diskon');
            $table->integer('minimal_pembelian_total_harga');
            $table->integer('stok');
        });

        Artisan::call('db:seed', [
            '--class' => VoucherDiskonSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher_diskon');
    }
}
