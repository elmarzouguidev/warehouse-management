<?php

namespace Database\Seeders;

use App\Models\Warehouse\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warehouses = [

            ['name' => 'AIN CHOK', 'contact' => 'abdo', 'address' => 'casablanca ain chok', 'city_id' => 1,],
            ['name' => 'DERB SULTAN', 'contact' => 'abdo', 'address' => 'casablanca derb sultan', 'city_id' => 1,],
        ];

        foreach ($warehouses as $warehouse) {
            Warehouse::create($warehouse);
        }
    }
}
