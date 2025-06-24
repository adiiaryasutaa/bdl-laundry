<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addresses extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'code',
        'label',
        'phone',
        'address_text',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Scopes
    public function scopeByCustomer($query, $customerId)
    {
        return $query->where('customer_id', $customerId);
    }

    public function scopeByLabel($query, $label)
    {
        return $query->where('label', 'like', "%{$label}%");
    }

    // Accessors
    public function getFullAddressAttribute()
    {
        return $this->label . ': ' . $this->address_text;
    }
} 