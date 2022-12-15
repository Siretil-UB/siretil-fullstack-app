<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengajuan;


class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengajuan::factory()->create([
            'Tim_Ketua_Pengguna_NIM' => '205150201111001',
            'Tim_namaTim'=>'tim1',
            'Mahasiswa_Pengguna_NIM' => '205150201111008'
        ]);

        Pengajuan::factory()->create([
            'Tim_Ketua_Pengguna_NIM' => '205150201111001',
            'Tim_namaTim'=>'tim1',
            'Mahasiswa_Pengguna_NIM' => '205150201111006'
        ]);

        Pengajuan::factory()->create([
            'Tim_Ketua_Pengguna_NIM' => '205150201111001',
            'Tim_namaTim'=>'tim1',
            'Mahasiswa_Pengguna_NIM' => '205150201111007'
        ]);
    }
}
