<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Warehouse\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zones = [
            ['name' => 'ZONE A', 'warehouse_id' => 1],
            ['name' => 'ZONE B', 'warehouse_id' => 1],
            ['name' => 'ZONE C', 'warehouse_id' => 1],

            ['name' => 'ZONE BY', 'warehouse_id' => 2],
            ['name' => 'ZONE CM', 'warehouse_id' => 2],
            ['name' => 'ZONE CT', 'warehouse_id' => 2],
        ];

        foreach ($zones as $zone) {
            Zone::create($zone);
        }
    }
}
