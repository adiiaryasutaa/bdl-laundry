<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaundryOrderItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'laundry_order_id',
        'item_id',
        'code',
        'quantity',
        'subtotal',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'subtotal' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relationships
    public function laundryOrder()
    {
        return $this->belongsTo(LaundryOrder::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Methods
    public function calculateSubtotal()
    {
        if ($this->item) {
            $price = $this->item->unit_type === 'kg' ? $this->item->price_per_kg : $this->item->price_per_piece;
            $this->subtotal = $price * $this->quantity;
            return $this->subtotal;
        }
        return 0;
    }

    // Mutators
    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = $value;
        $this->calculateSubtotal();
    }
} 