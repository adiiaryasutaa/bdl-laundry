<?php

namespace Database\Seeders;

use App\Models\Addresses;
use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing customers
        $customers = Customer::all();

        // Create 1-3 addresses for each customer
        $customers->each(function ($customer) {
            $numAddresses = rand(1, 3);
            
            Addresses::factory($numAddresses)->create([
                'customer_id' => $customer->id,
            ]);
        });
    }
}
