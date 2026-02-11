<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'type', 'price', 'image', 'description', 'amenities', 'is_available'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
