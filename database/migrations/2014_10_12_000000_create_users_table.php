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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20)->unique();
            $table->string('NIM_Ketua', 20)->nullable()->unique();
            $table->string('NIM_Mahasiswa', 20)->nullable()->unique();
            $table->string('nama', 30);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign("NIM_Ketua")->references('Pengguna_NIM')->on('ketua');
            $table->foreign("NIM_Mahasiswa")->references('Pengguna_NIM')->on('mahasiswa');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
