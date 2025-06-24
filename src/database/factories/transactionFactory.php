<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class transactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $paymentStatuses = ['unpaid', 'paid', 'partial'];
        
        return [
            'code' => 'TRX-' . $this->faker->unique()->numerify('########'),
            'transaction_date' => $this->faker->dateTimeBetween('-30 days', 'now')->format('Y-m-d'),
            'payment_status' => $this->faker->randomElement($paymentStatuses),
        ];
    }
}
