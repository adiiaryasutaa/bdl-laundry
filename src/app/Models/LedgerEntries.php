<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LedgerEntries extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'description',
        'amount',
        'type',
        'transaction_id',
        'recorded_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'recorded_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relationships
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    // Scopes
    public function scopeIncome($query)
    {
        return $query->where('type', 'income');
    }

    public function scopeExpense($query)
    {
        return $query->where('type', 'expense');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeDateRange($query, $start, $end)
    {
        return $query->whereBetween('recorded_at', [$start, $end]);
    }

    public function scopeToday($query)
    {
        return $query->whereDate('recorded_at', today());
    }

    public function scopeThisMonth($query)
    {
        return $query->whereYear('recorded_at', now()->year)
                    ->whereMonth('recorded_at', now()->month);
    }

    // Methods
    public static function getTotalIncome($start = null, $end = null)
    {
        $query = static::income();
        
        if ($start && $end) {
            $query->whereBetween('recorded_at', [$start, $end]);
        }
        
        return $query->sum('amount');
    }

    public static function getTotalExpense($start = null, $end = null)
    {
        $query = static::expense();
        
        if ($start && $end) {
            $query->whereBetween('recorded_at', [$start, $end]);
        }
        
        return $query->sum('amount');
    }

    public static function getNetProfit($start = null, $end = null)
    {
        return static::getTotalIncome($start, $end) - static::getTotalExpense($start, $end);
    }
} 