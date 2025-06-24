<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call seeders in correct order (considering foreign key dependencies)
        $this->call([
            // Base tables (no dependencies)
            userSeeder::class,
            customerSeeder::class,
            itemSeeder::class,
            transactionSeeder::class,
            
            // Tables with dependencies
            orderSeeder::class,          // depends on customers & transactions
            orderItemSeeder::class,      // depends on orders & items
            paymentSeeder::class,        // depends on transactions
            invoiceSeeder::class,        // depends on transactions
            ledgerEntriesSeeder::class,  // depends on transactions
            addressesSeeder::class,      // depends on customers
        ]);
    }
}
