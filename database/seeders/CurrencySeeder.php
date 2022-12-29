<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Utilities\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [

            ['name' => 'Dirham Maroccan', 'symbole' => 'DH', 'default' => true],

        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
