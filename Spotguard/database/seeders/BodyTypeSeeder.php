<?php

namespace Database\Seeders;

use App\Models\BodyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            'Sedan',
            'Hatchback',
            'SUV',
            'MPV',
            'Pickup',
            'Van',
            'Transport Vehicles (jeepneys)',
            'Utility Vehicle (wheeler trucks)',

        ];

        foreach ($array as $name) {
            BodyType::create([
                'name' => $name,
            ]);
        }
    }
}
