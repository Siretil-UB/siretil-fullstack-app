<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::factory()->create([
            'sender' => '205150201111001',
            'receiver' => '205150201111002',
            'sent' => now()
        ]);

        Message::factory()->create([
            'sender' => '205150201111001',
            'receiver' => '205150201111002',
            'sent' => now()
        ]);
    }
}
