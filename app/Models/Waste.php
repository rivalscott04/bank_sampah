<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'price_per_kg',
    ];

    protected $casts = [
        'price_per_kg' => 'decimal:2',
    ];

    /**
     * Get the category of this waste
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get transactions for this waste
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get pickup requests for this waste
     */
    public function pickupRequests()
    {
        return $this->hasMany(PickupRequest::class);
    }
}