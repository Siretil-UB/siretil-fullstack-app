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
        Schema::create('tim', function (Blueprint $table) {
            $table->string("namaTim", 20)->primary();
            $table->string("ketua_pengguna_NIM", 20);
            $table->string("lomba", 20);

            $table->foreign("ketua_pengguna_NIM")->references("Pengguna_NIM")->on("ketua");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tim');
    }
};
