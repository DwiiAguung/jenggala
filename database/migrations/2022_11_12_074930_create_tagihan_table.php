<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')
                ->constrained('pesanan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('total_harga');
            $table->string('nama_pembayar')->nullable();
            $table->foreignId('voucher_diskon_id')
                ->nullable()
                ->default(null)
                ->constrained('voucher_diskon')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('metode_pembayaran_id')
                ->nullable()
                ->default(null)
                ->constrained('metode_pembayaran')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('status_pembayaran_id')
                ->default(1)
                ->constrained('status_pembayaran')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihan');
    }
}
