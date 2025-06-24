<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create specific customers
        Customer::create([
            'code' => 'CUST-0001',
            'name' => 'Hotel Bintang Lima',
            'phone' => '081234567890',
            'email' => 'manager@hotelbintanglima.com',
            'address' => 'Jl. Sudirman No. 123, Jakarta',
            'type' => 'hotel',
        ]);

        Customer::create([
            'code' => 'CUST-0002',
            'name' => 'Villa Paradise',
            'phone' => '081234567891',
            'email' => 'info@villaparadise.com',
            'address' => 'Jl. Pantai Kuta No. 456, Bali',
            'type' => 'villa',
        ]);

        Customer::create([
            'code' => 'CUST-0003',
            'name' => 'Budi Santoso',
            'phone' => '081234567892',
            'email' => 'budi.santoso@gmail.com',
            'address' => 'Jl. Mawar No. 789, Bandung',
            'type' => 'personal',
        ]);

        // Create random customers
        Customer::factory(50)->create();
    }
}
