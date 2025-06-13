<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'waste_id',
        'address',
        'date_request',
        'estimated_weight',
        'status',
    ];

    protected $casts = [
        'date_request' => 'date',
        'estimated_weight' => 'decimal:2',
    ];

    /**
     * Get the user who made this pickup request
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the waste type for this pickup request
     */
    public function waste()
    {
        return $this->belongsTo(Waste::class);
    }

    /**
     * Check if request is pending
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Check if request is picked up
     */
    public function isPickedUp(): bool
    {
        return $this->status === 'dijemput';
    }

    /**
     * Check if request is completed
     */
    public function isCompleted(): bool
    {
        return $this->status === 'selesai';
    }

    /**
     * Mark as picked up
     */
    public function markAsPickedUp(): void
    {
        $this->update(['status' => 'dijemput']);
    }

    /**
     * Mark as completed
     */
    public function markAsCompleted(): void
    {
        $this->update(['status' => 'selesai']);
    }
}