<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ketua;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Ketua::factory()->create([
            'Pengguna_NIM' => '205150201111001'
        ]);

        User::factory()->create([
            'nama' => 'John Doe',
            'nim' => '205150201111001',
            'nim_ketua' => '205150201111001',
            'password' => Hash::make("123456789"),
            'isKetua' => true
        ]);

        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111002',
            'cv' => 'tes',
            'role' => 'tes',
            'wa' => '00'
        ]);

        User::factory()->create([
            'nama' => 'Jane Doe',
            'nim' => '205150201111002',
            'password' => Hash::make("123456789"),
            'nim_mahasiswa' => '205150201111002'
        ]);

        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111003',
            'cv' => 'tes',
            'role' => 'tes',
            'wa' => '00'
        ]);

        User::factory()->create([
            'nama' => 'Youn Doe',
            'nim' => '205150201111003',
            'password' => Hash::make("123456789"),
            'nim_mahasiswa' => '205150201111003'
        ]);

    }
}
