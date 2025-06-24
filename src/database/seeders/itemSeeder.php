<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create specific laundry items
        $items = [
            [
                'code' => 'ITEM-0001',
                'name' => 'Cuci Reguler',
                'category' => 'reguler',
                'price_per_kg' => 8000.00,
                'price_per_piece' => null,
                'unit_type' => 'kg',
            ],
            [
                'code' => 'ITEM-0002',
                'name' => 'Cuci Express',
                'category' => 'express',
                'price_per_kg' => 12000.00,
                'price_per_piece' => null,
                'unit_type' => 'kg',
            ],
            [
                'code' => 'ITEM-0003',
                'name' => 'Cuci Kering',
                'category' => 'cuci_kering',
                'price_per_kg' => 15000.00,
                'price_per_piece' => null,
                'unit_type' => 'kg',
            ],
            [
                'code' => 'ITEM-0004',
                'name' => 'Cuci Setrika',
                'category' => 'cuci_setrika',
                'price_per_kg' => 10000.00,
                'price_per_piece' => null,
                'unit_type' => 'kg',
            ],
            [
                'code' => 'ITEM-0005',
                'name' => 'Dry Clean',
                'category' => 'dry_clean',
                'price_per_kg' => 25000.00,
                'price_per_piece' => 15000.00,
                'unit_type' => 'pcs',
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }

        // Create random items
        Item::factory(20)->create();
    }
}
