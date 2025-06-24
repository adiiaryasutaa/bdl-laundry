<?php

namespace Database\Factories;

use App\Models\LaundryOrder;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LaundryOrderItem>
 */
class laundryOrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = $this->faker->numberBetween(1, 10);
        $pricePerUnit = $this->faker->randomFloat(2, 5000, 25000);
        
        return [
            'laundry_order_id' => LaundryOrder::factory(),
            'item_id' => Item::factory(),
            'code' => 'ORDERITEM-' . $this->faker->unique()->numerify('########'),
            'quantity' => $quantity,
            'subtotal' => $quantity * $pricePerUnit,
        ];
    }
}
