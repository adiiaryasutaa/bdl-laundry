<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class paymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $paymentMethods = ['cash', 'transfer', 'credit_card', 'debit_card', 'e_wallet'];
        
        return [
            'code' => 'PAY-' . $this->faker->unique()->numerify('########'),
            'transaction_id' => Transaction::factory(),
            'amount' => $this->faker->randomFloat(2, 10000, 500000),
            'payment_method' => $this->faker->randomElement($paymentMethods),
            'paid_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
