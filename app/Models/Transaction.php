<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'description',
        'amount',
        'status',
        'method',
        'reference',
        'metadata',
        'processed_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'metadata' => 'array',
        'processed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope methods for filtering
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeDeposits($query)
    {
        return $query->where('type', 'deposit');
    }

    public function scopeWithdrawals($query)
    {
        return $query->where('type', 'withdrawal');
    }

    public function scopeInvestments($query)
    {
        return $query->where('type', 'investment');
    }

    public function scopeDividends($query)
    {
        return $query->where('type', 'dividend');
    }

    // Helper methods for easy access
    public function deposit()
    {
        return $this->type === 'deposit';
    }

    public function isWithdrawal()
    {
        return $this->type === 'withdrawal';
    }

    public function isInvestment()
    {
        return $this->type === 'investment';
    }

    public function isDividend()
    {
        return $this->type === 'dividend';
    }

    public function isCompleted()
    {
        return $this->status === 'completed';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }
}
