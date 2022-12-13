<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Anggota;
use App\Models\Ketua;
use App\Models\Mahasiswa;
use App\Models\Tim;
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

        Ketua::factory()->create([
            'Pengguna_NIM' => '205150201111004'
        ]);

        User::factory()->create([
            'nama' => 'John De',
            'nim' => '205150201111004',
            'nim_ketua' => '205150201111004',
            'password' => Hash::make("123456789"),
            'isKetua' => true
        ]);
        Ketua::factory()->create([
            'Pengguna_NIM' => '205150201111005'
        ]);

        User::factory()->create([
            'nama' => 'John Wu',
            'nim' => '205150201111005',
            'nim_ketua' => '205150201111005',
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

        Tim::factory()->create([
            'namaTim' => 'tim1',
            'Ketua_Pengguna_NIM' => '205150201111001',
            'lomba' => 'lomba1'
        ]);

        Tim::factory()->create([
            'namaTim' => 'tim2',
            'Ketua_Pengguna_NIM' => '205150201111004',
            'lomba' => 'lomba1'
        ]);
        Tim::factory()->create([
            'namaTim' => 'tim3',
            'Ketua_Pengguna_NIM' => '205150201111005',
            'lomba' => 'lomba2'
        ]);

        Anggota::factory()->create([
            'Tim_Ketua_Pengguna_NIM' => '205150201111001',
            'Tim_namaTim' => 'tim1',
            'Mahasiswa_Pengguna_NIM' => '205150201111002'
        ]);
        Anggota::factory()->create([
            'Tim_Ketua_Pengguna_NIM' => '205150201111001',
            'Tim_namaTim' => 'tim1',
            'Mahasiswa_Pengguna_NIM' => '205150201111003'
        ]);

    }
}
