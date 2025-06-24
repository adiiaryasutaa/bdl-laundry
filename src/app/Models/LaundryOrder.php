<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaundryOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'transaction_id',
        'code',
        'pickup_at',
        'delivered_at',
        'status',
        'alamat',
    ];

    protected $casts = [
        'pickup_at' => 'datetime',
        'delivered_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function laundryOrderItems()
    {
        return $this->hasMany(LaundryOrderItem::class);
    }

    // Scopes
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeProcessing($query)
    {
        return $query->where('status', 'processing');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeDelivered($query)
    {
        return $query->where('status', 'delivered');
    }

    // Methods
    public function getTotalAmountAttribute()
    {
        return $this->laundryOrderItems()->sum('subtotal');
    }

    public function getTotalItemsAttribute()
    {
        return $this->laundryOrderItems()->sum('quantity');
    }
} 