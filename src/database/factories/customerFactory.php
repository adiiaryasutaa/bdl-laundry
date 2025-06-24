<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class customerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customerTypes = ['hotel', 'villa', 'personal'];
        
        return [
            'code' => 'CUST-' . $this->faker->unique()->numerify('####'),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->optional(0.7)->safeEmail(),
            'address' => $this->faker->optional(0.8)->address(),
            'type' => $this->faker->randomElement($customerTypes),
        ];
    }
}
