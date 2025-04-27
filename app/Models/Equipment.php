<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price_per_day',
        'quantity_available',
        'image',
        'is_available'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
