<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Utilities\Unite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unites = [
            ['name' => 'Kilo', 'symbole' => 'KG'],
            ['name' => 'mètre', 'symbole' => 'M'],
            ['name' => 'Lettre', 'symbole' => 'L'],
            ['name' => 'pièce', 'symbole' => 'UT'],
        ];

        foreach ($unites as $unite) {
            Unite::create($unite);
        }
    }
}
