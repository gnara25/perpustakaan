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
        Schema::create('detailbukus', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi');
            $table->string('id_buku');
            $table->string('id_siswa');
            $table->string('id_laporan');
            $table->string('namabuku');
            $table->string('kodebuku');
            $table->string('jumlah');
            $table->string('jumlahlaporan');
            $table->string('denda');
            $table->string('status');
            $table->date('tglpengembalian');
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
        Schema::dropIfExists('detailbukus');
    }
};
