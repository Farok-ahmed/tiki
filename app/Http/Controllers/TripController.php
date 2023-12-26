<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Location;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }

    // public function create()
    // {
    //     return view('trips.create');
    // }
    public function create()
    {
        $locations = Location::all();
        return view('trips.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trip_date' => 'required|date',
            'location_id' => 'required|exists:locations,id'

        ]);

        Trip::create([
            'trip_date' => $request->trip_date,
            'location_id' => $request->location_id

        ]);

        return redirect()->route('trips.index')->with('success', 'Trip created successfully.');
    }
    public function show($id)
    {
        $trip = Trip::findOrFail($id);
        return view('trips.show', compact('trip'));
    }
}
