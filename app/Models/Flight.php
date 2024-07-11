<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id', 'airline_id', 'departure_time', 'arrival_time', 'direct_flight'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_flights')->withTimestamps();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
