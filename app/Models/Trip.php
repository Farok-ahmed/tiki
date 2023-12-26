<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable=[
        'trip_date',
        'location_id'
    ];
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function seats(){
        return $this->hasMany(SeatAllocation::class);
    }
    public function fromLocation(){
        return $this->belongsTo(Location::class,'from_location_id');
    }
    public function toLocation(){
        return $this->belongsTo(Location::class,'to_location_id');
    }
    public function showAvailableSeats()
{
    $trips = Trip::all(); // Fetch all trips from the database

    return view('tickets.showAvailableSeats', compact('trips'));
}
}
