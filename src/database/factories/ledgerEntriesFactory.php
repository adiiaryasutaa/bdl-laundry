<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LedgerEntry>
 */
class ledgerEntriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['income', 'expense'];
        $descriptions = [
            'income' => ['Pendapatan Laundry', 'Pembayaran Customer', 'Pendapatan Jasa'],
            'expense' => ['Pembelian Deterjen', 'Listrik', 'Air', 'Gaji Karyawan', 'Perawatan Mesin']
        ];
        
        $type = $this->faker->randomElement($types);
        
        return [
            'code' => 'LED-' . $this->faker->unique()->numerify('########'),
            'description' => $this->faker->randomElement($descriptions[$type]),
            'amount' => $this->faker->randomFloat(2, 10000, 1000000),
            'type' => $type,
            'transaction_id' => null, // Will be set in seeder
            'recorded_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
