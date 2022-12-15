<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Ketua;
use App\Models\Mahasiswa;

class Actor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ketua
        Ketua::factory()->create([
            'Pengguna_NIM' => '205150201111001'
        ]);

        User::factory()->create([
            'nim' => '205150201111001',
            'nim_ketua' => '205150201111001',
            'password' => Hash::make("asd"),
            'isKetua' => true
        ]);

        Ketua::factory()->create([
            'Pengguna_NIM' => '205150201111004'
        ]);

        User::factory()->create([
            'nim' => '205150201111004',
            'nim_ketua' => '205150201111004',
            'password' => Hash::make("asd"),
            'isKetua' => true
        ]);


        // mahasiswa
        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111002',
            'cv' => 'cv.pdf',
            'role' => 'Network Engineer'
        ]);

        User::factory()->create([
            'nim' => '205150201111002',
            'password' => Hash::make("asd"),
            'nim_mahasiswa' => '205150201111002'
        ]);

        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111003',
            'role' => 'Security Engineer'
        ]);

        User::factory()->create([
            'nim' => '205150201111003',
            'password' => Hash::make("asd"),
            'nim_mahasiswa' => '205150201111003'
        ]);

        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111006',
            'role' => 'Web Developer'
        ]);

        User::factory()->create([
            'nim' => '205150201111006',
            'password' => Hash::make("asd"),
            'nim_mahasiswa' => '205150201111006'
        ]);

        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111007',
            'role' => 'Kotlin Programmer'
        ]);

        User::factory()->create([
            'nim' => '205150201111007',
            'password' => Hash::make("asd"),
            'nim_mahasiswa' => '205150201111007'
        ]);
        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111008',
            'role' => 'Sys-Admin'
        ]);

        User::factory()->create([
            'nim' => '205150201111008',
            'password' => Hash::make("asd"),
            'nim_mahasiswa' => '205150201111008'
        ]);
        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111009',
            'role' => 'UI/UX Researcher'
        ]);

        User::factory()->create([
            'nim' => '205150201111009',
            'password' => Hash::make("asd"),
            'nim_mahasiswa' => '205150201111009'
        ]);
        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111010',
            'role' => 'QA Engineer'
        ]);

        User::factory()->create([
            'nim' => '205150201111010',
            'password' => Hash::make("asd"),
            'nim_mahasiswa' => '205150201111010'
        ]);
        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111011',
            'role' => 'QA Engineer'
        ]);

        User::factory()->create([
            'nim' => '205150201111011',
            'password' => Hash::make("asd"),
            'nim_mahasiswa' => '205150201111011'
        ]);
        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111012',
            'role' => 'React Programmer'
        ]);

        User::factory()->create([
            'nim' => '205150201111012',
            'password' => Hash::make("asd"),
            'nim_mahasiswa' => '205150201111012'
        ]);
        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111013',
            'role' => 'React Native Dev'
        ]);

        User::factory()->create([
            'nim' => '205150201111013',
            'password' => Hash::make("asd"),
            'nim_mahasiswa' => '205150201111013'
        ]);
        Mahasiswa::factory()->create([
            'Pengguna_NIM' => '205150201111014',
            'role' => 'Software Engineer'
        ]);

        User::factory()->create([
            'nim' => '205150201111014',
            'password' => Hash::make("asd"),
            'nim_mahasiswa' => '205150201111014'
        ]);
    }
}
