<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_points',
    ];

    /**
     * Get the user who owns these points
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Add points to user
     */
    public function addPoints(int $points): void
    {
        $this->increment('total_points', $points);
    }

    /**
     * Subtract points from user
     */
    public function subtractPoints(int $points): void
    {
        $this->decrement('total_points', $points);
    }
}