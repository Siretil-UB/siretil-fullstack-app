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
        Schema::create('kriteria', function (Blueprint $table) {
            $table->string("role",10)->primary();
            $table->string('Tim_Ketua_Pengguna_NIM', 20);
            $table->string('Tim_namaTim', 20);
            $table->string("fakultas",30);
            $table->string("jurusan",30);

            $table->foreign(['Tim_Ketua_Pengguna_NIM', 'Tim_namaTim'])->references(['ketua_pengguna_NIM','namaTim'])->on('tim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria');
    }
};
