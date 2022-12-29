<?php

namespace Database\Seeders;

use App\Models\City\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            
            ['name' => 'MOHAMMEDIA', 'city_id' => 1],
            ['name' => 'BOUZNIKA', 'city_id' => 1],
            ['name' => 'TIZNIT', 'city_id' => 4],
            
        ];

        collect($regions)->each(function ($region) {
            Region::create($region);
        });
    }
}
