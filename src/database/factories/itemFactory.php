<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class itemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['cuci_kering', 'cuci_setrika', 'dry_clean', 'express', 'reguler'];
        $unitTypes = ['kg', 'pcs'];
        
        return [
            'code' => 'ITEM-' . $this->faker->unique()->numerify('####'),
            'name' => $this->faker->words(2, true),
            'category' => $this->faker->randomElement($categories),
            'price_per_kg' => $this->faker->randomFloat(2, 5000, 25000),
            'price_per_piece' => $this->faker->optional(0.5)->randomFloat(2, 2000, 15000),
            'unit_type' => $this->faker->randomElement($unitTypes),
        ];
    }
}
