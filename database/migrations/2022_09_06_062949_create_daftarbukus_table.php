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
        Schema::create('daftarbukus', function (Blueprint $table) {
            $table->id();
            $table->string('namabuku');
            $table->string('kategori');
            $table->string('kodebuku');
            $table->string('penerbit');
            $table->bigInteger('tahunterbit');
            $table->bigInteger('jumlah');
            $table->bigInteger('rusak');
            $table->bigInteger('dipinjam');
            $table->string('status');
            $table->string('foto');
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
        Schema::dropIfExists('daftarbukus');
    }
};
