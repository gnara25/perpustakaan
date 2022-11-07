<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukukembalis', function (Blueprint $table) {
            $table->id();
            // $table->string('id_siswa');
            $table->string('id_transaksi');
            $table->string('id_denda');
            $table->string('namabuku');
            $table->string('kodebuku');
            $table->string('jumlah');
            $table->string('denda');
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
        Schema::dropIfExists('bukukembalis');
    }
};
