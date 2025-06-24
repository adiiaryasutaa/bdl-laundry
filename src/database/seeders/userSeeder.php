<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create specific admin user
        User::create([
            'code' => 'USER-0001',
            'name' => 'Admin Laundry',
            'email' => 'admin@laundry.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create specific staff user
        User::create([
            'code' => 'USER-0002',
            'name' => 'Staff Laundry',
            'email' => 'staff@laundry.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);

        // Create specific finance user
        User::create([
            'code' => 'USER-0003',
            'name' => 'Finance Laundry',
            'email' => 'finance@laundry.com',
            'password' => Hash::make('password'),
            'role' => 'finance',
        ]);

        // Create random users
        User::factory(10)->create();
    }
}
