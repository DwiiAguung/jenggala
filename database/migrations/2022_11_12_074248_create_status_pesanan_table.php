<?php

use Database\Seeders\StatusPesananSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('status');
        });

        Artisan::call('db:seed', [
            '--class' => StatusPesananSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_pesanan');
    }
}
