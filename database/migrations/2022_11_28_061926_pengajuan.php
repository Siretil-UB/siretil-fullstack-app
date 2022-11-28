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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->string('Tim_Ketua_Pengguna_NIM', 20);
            $table->string('Tim_namaTim', 20);
            $table->string('Mahasiswa_Pengguna_NIM', 20);

            $table->foreign(['Tim_Ketua_Pengguna_NIM', 'Tim_namaTim'])->references(['ketua_pengguna_NIM','namaTim'])->on('tim');
            $table->foreign("Mahasiswa_Pengguna_NIM")->references("Pengguna_NIM")->on('mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan');
    }
};
