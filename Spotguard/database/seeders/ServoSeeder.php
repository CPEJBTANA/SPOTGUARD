<?php

namespace Database\Seeders;

use App\Models\Servo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servo::create([
            'status' => 0,
        ]);
    }
}
