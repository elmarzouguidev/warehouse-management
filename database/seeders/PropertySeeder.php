<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Warehouse\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['name' => 'Damage'],
            ['name' => 'Holding'],
            ['name' => 'Inspection'],
            ['name' => 'Normal'],
        ];

        foreach ($datas as $data) {
            Property::create($data);
        }
    }
}
