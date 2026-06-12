<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Amenity;
class AmenitySeeder extends Seeder
{
    public function run(): void
    {
        $amenities = [
            'WiFi',
            'Parking',
            'Climatisation',
            'Piscine',
            'TV',
            'Cuisine équipée',
            'Chauffage',
            'Balcon',
            'Jardin',
            'Ascenseur',
            'Machine à laver',
            'Sécurité 24h',
        ];

        foreach ($amenities as $name) {
            Amenity::create([
                'name' => $name
            ]);
        }
    }
}