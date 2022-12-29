<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Warehouse\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            ['name' => 'Tiny', 'wide' => 200, 'depth' => 250, 'height' => 300],
            ['name' => 'Small', 'wide' => 800, 'depth' => 1000, 'height' => 1200],
            ['name' => 'Floor', 'wide' => 10000, 'depth' => 10000, 'height' => 10000],
            ['name' => 'Big', 'wide' => 1100, 'depth' => 1200, 'height' => 1800],

        ];

        foreach ($sizes as $size) {
            Size::create($size);
        }
    }
}
