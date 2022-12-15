<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tim;
use App\Models\Anggota;
use App\Models\Kriteria;

class TimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tim::factory()->create([
            'namaTim' => 'tim1',
            'Ketua_Pengguna_NIM' => '205150201111001',
            'lomba' => 'lomba1'
        ]);

        Kriteria::factory()->create([
            'role' => "FE Dev",
            'Tim_Ketua_Pengguna_NIM' => '205150201111001',
            'Tim_namaTim' => 'tim1',
            'fakultas' => 'Fakultas Ilmu Komputer',
            'jurusan' => 'Teknik Informatika'
        ]);

        Tim::factory()->create([
            'namaTim' => 'tim2',
            'Ketua_Pengguna_NIM' => '205150201111004',
            'lomba' => 'lomba1'
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
