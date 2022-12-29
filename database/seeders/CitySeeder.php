<?php

namespace Database\Seeders;

use App\Models\City\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [

            ['name' => 'Casablanca'],
            ['name' => 'Fes'],
            ['name' => 'Rabat'],
            ['name' => 'Agadir'],

        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
