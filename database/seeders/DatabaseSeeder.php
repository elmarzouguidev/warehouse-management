<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CitySeeder::class);
        $this->call(RegionSeeder::class);

        $this->call(PropertySeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(WarehouseSeeder::class);
        $this->call(ZoneSeeder::class);

        $this->call(CurrencySeeder::class);
        $this->call(TaxeSeeder::class);
        $this->call(UniteSeeder::class);

        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
