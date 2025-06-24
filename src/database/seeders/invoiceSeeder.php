<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class invoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing transactions
        $transactions = Transaction::all();

        // Create invoices for transactions
        $transactions->each(function ($transaction) {
            // 60% of transactions have invoices
            if (rand(1, 100) <= 60) {
                Invoice::factory()->create([
                    'transaction_id' => $transaction->id,
                ]);
            }
        });
    }
}
