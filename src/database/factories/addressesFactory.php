<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class addressesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $labels = ['Rumah', 'Kantor', 'Gudang', 'Apartemen', 'Villa', 'Hotel'];
        
        return [
            'customer_id' => Customer::factory(),
            'code' => 'ADDR-' . $this->faker->unique()->numerify('########'),
            'label' => $this->faker->randomElement($labels),
            'phone' => $this->faker->optional(0.6)->phoneNumber(),
            'address_text' => $this->faker->address(),
        ];
    }
}
