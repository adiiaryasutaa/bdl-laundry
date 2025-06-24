<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class paymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing transactions
        $transactions = Transaction::all();

        // Create payments for transactions
        $transactions->each(function ($transaction) {
            // 70% of transactions have payments
            if (rand(1, 100) <= 70) {
                Payment::factory()->create([
                    'transaction_id' => $transaction->id,
                ]);
            }
        });

        // Create additional random payments
        Payment::factory(30)->create([
            'transaction_id' => function() use ($transactions) {
                return $transactions->random()->id;
            }
        ]);
    }
}
