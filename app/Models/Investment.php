<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'amount',
        'current_value',
        'returns',
        'return_percentage',
        'allocation',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'current_value' => 'decimal:2',
        'returns' => 'decimal:2',
        'return_percentage' => 'decimal:2',
        'allocation' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the plan name (alias for name for backward compatibility)
     */
    public function getPlanNameAttribute()
    {
        return $this->name;
    }
}
