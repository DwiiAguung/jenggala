<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatalogPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katalog_pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('katalog_id')
                ->constrained('katalog')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('pesanan_id')
                ->constrained('pesanan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('status_pesanan_id')
                ->default(1)
                ->constrained('status_pesanan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('qty');
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
        Schema::dropIfExists('katalog_pesanan');
    }
}
