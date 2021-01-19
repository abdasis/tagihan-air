<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggunaans', function (Blueprint $table) {
            $table->id();
            $table->integer('awal_meter');
            $table->integer('akhir_meter');
            $table->integer('pemakaian_liter');
            $table->integer('pemakaian_kubik');
            $table->integer('biaya_admin')->nullable();
            $table->integer('biaya_perawatan')->nullable();
            $table->integer('harga_kubik')->nullable();
            $table->integer('diskon')->nullable();
            $table->integer('tagihan')->nullable();
            $table->foreignId('pengguna')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('penggunaans');
    }
}
