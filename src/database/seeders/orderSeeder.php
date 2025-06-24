<?php

namespace Database\Seeders;

use App\Models\LaundryOrder;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class orderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing customers and transactions
        $customers = Customer::all();
        $transactions = Transaction::all();

        // Check if we have data to work with
        if ($customers->isEmpty()) {
            $this->command->info('No customers found. Please run customerSeeder first.');
            return;
        }

        // Create laundry orders with existing relationships
        LaundryOrder::factory(80)->create([
            'customer_id' => function() use ($customers) {
                return $customers->random()->id;
            },
            'transaction_id' => function() use ($transactions) {
                // 80% chance of having a transaction_id, 20% chance of null
                if ($transactions->isNotEmpty() && fake()->boolean(80)) {
                    return $transactions->random()->id;
                }
                return null;
            }
        ]);
    }
}
