<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        User::factory()->create([
            'nama' => 'John Doe',
            'nim' => '205150201111001',
            'password' => Hash::make("123456789"),
            'isKetua' => true
        ]);

        User::factory()->create([
            'nama' => 'Jane Doe',
            'nim' => '205150201111002',
            'password' => Hash::make("123456789")
        ]);
    }
}
