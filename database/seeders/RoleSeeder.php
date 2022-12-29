<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected array $roles = [

        ['name' => 'SuperAdmin'],
        ['name' => 'Manager'],
        ['name' => 'Developper'],

    ];

    public function run()
    {
        foreach ($this->roles as $role) {
            Role::create($role);
        }
    }
}
