<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'waste_id',
        'weight',
        'total_price',
        'total_points',
        'date',
    ];

    protected $casts = [
        'weight' => 'decimal:2',
        'total_price' => 'decimal:2',
        'date' => 'date',
    ];

    /**
     * Get the user who made this transaction
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the waste type for this transaction
     */
    public function waste()
    {
        return $this->belongsTo(Waste::class);
    }
}