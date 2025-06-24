<?php

namespace Database\Seeders;

use App\Models\LedgerEntries;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ledgerEntriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing transactions
        $transactions = Transaction::all();

        // Create ledger entries related to transactions
        $transactions->each(function ($transaction) {
            // Create income entry for the transaction
            LedgerEntries::factory()->create([
                'transaction_id' => $transaction->id,
                'type' => 'income',
                'description' => 'Pendapatan dari Transaksi ' . $transaction->code,
            ]);
        });

        // Create additional random ledger entries (expenses, etc.)
        LedgerEntries::factory(50)->create();
    }
}
