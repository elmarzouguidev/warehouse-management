<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Utilities\Taxe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxes = [
            ['name' => 'TVA', 'taux_percent' => '20%'],
            ['name' => 'TVA', 'taux_percent' => '14%'],
            ['name' => 'TVA', 'taux_percent' => '10%'],
        ];

        foreach ($taxes as $taxe) {
            Taxe::create($taxe);
        }
    }
}
