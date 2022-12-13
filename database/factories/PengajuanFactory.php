<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengajuan>
 */
class PengajuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Tim_Ketua_Pengguna_NIM' => '205150201111001',
            'Tim_namaTim'=>'tim1',
            'Mahasiswa_Pengguna_NIM' => '205150201111002'
        ];
    }
}
