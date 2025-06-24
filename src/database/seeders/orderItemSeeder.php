<?php

namespace Database\Seeders;

use App\Models\LaundryOrderItem;
use App\Models\LaundryOrder;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class orderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing orders and items
        $orders = LaundryOrder::all();
        $items = Item::all();

        // Create order items for each order (1-5 items per order)
        $orders->each(function ($order) use ($items) {
            $numItems = rand(1, 5);
            
            for ($i = 0; $i < $numItems; $i++) {
                $item = $items->random();
                $quantity = rand(1, 10);
                
                LaundryOrderItem::create([
                    'laundry_order_id' => $order->id,
                    'item_id' => $item->id,
                    'code' => 'ORDERITEM-' . str_pad($order->id . $i . time(), 8, '0', STR_PAD_LEFT),
                    'quantity' => $quantity,
                    'subtotal' => $quantity * $item->price_per_kg,
                ]);
            }
        });
    }
}
