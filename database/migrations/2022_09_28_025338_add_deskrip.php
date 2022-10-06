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
        Schema::table('daftarbukus', function (Blueprint $table) {
            $table->string('penulis')->after('kodebuku');
            $table->string('halbuku')->after('tahunterbit');
            $table->string('lokasibuku')->after('jumlah');
            $table->string('deskripsi')->after('lokasibuku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftarbukus', function (Blueprint $table) {
            //
        });
    }
};
