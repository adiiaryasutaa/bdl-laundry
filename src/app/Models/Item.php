<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'category',
        'price_per_kg',
        'price_per_piece',
        'unit_type',
    ];

    protected $casts = [
        'price_per_kg' => 'decimal:2',
        'price_per_piece' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relationships
    public function laundryOrderItems()
    {
        return $this->hasMany(LaundryOrderItem::class);
    }

    // Scopes
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeByUnitType($query, $unitType)
    {
        return $query->where('unit_type', $unitType);
    }

    // Accessors
    public function getPriceAttribute()
    {
        return $this->unit_type === 'kg' ? $this->price_per_kg : $this->price_per_piece;
    }
} 