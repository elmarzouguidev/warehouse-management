<?php

namespace Database\Seeders;

use App\Models\Auth\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Abdelghafour',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];

        $admin = User::whereEmail('admin@gmail.com')->first();

        if (!$admin) {
            $newAdmin = User::create($user);
            $newAdmin->assignRole('SuperAdmin', 'Developper');
        } else {
            $admin->assignRole('SuperAdmin', 'Developper');
        }
    }
}
