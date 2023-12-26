<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class SeatAllocationController extends Controller
{
    //
    protected $fillable = ['trip_id', 'user_id', 'set_number'];
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
