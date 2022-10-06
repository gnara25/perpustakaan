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
        Schema::create('daftar_anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->string('nama');
            $table->string('tgl_lahir');
            $table->string('kelas');
            $table->string('alamat');
            $table->string('qr_code');
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
        Schema::dropIfExists('daftar_anggotas');
    }
};
