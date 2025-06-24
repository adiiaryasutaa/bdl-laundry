<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LaundryOrder>
 */
class laundryOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['pending', 'processing', 'completed', 'delivered'];
        
        return [
            'customer_id' => Customer::factory(),
            'transaction_id' => null, // Will be set in seeder
            'code' => 'ORDER-' . $this->faker->unique()->numerify('########'),
            'pickup_at' => $this->faker->optional(0.7)->dateTimeBetween('-7 days', '+7 days'),
            'delivered_at' => $this->faker->optional(0.4)->dateTimeBetween('-3 days', '+10 days'),
            'status' => $this->faker->randomElement($statuses),
            'alamat' => $this->faker->optional(0.6)->address(),
        ];
    }
}
