<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Models\SeatAllocation;
use PHPUnit\Framework\Attributes\Ticket;

class TicketController extends Controller
{
    public function showAvailableSeats()
{
    $trips = Trip::all(); // Fetch trips from the database or any other logic

    return view('tickets.showAvailableSeats', compact('trips'));
}
public function checkAvailability(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
        ]);

        $trips = Trip::findOrFail($request->trip_id);
        $bookedSeats = SeatAllocation::where('trip_id', $trips->id)->pluck('set_number')->toArray();

        // Assuming you have a total number of seats defined somewhere
        $totalSeats = 36;

        $availableSeats = array_diff(range(1, $totalSeats), $bookedSeats);

        return view('tickets.showAvailableSeats', compact('availableSeats'));
    }

    // Store a new ticket in the database
    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'user_id' => 'required|exists:users,id',
            'set_number' => 'required|integer',
        ]);

        // Check if the seat is available
        $isSeatAvailable = $this->isSeatAvailable($request->input('trip_id'), $request->input('set_number'));

        if ($isSeatAvailable) {
            // Create a new ticket
            Ticket::create($request->all());

            // Optionally, you can update the seat allocation status here

            return redirect()->route('tickets.index')->with('success', 'Ticket purchased successfully.');
        } else {
            return back()->with('error', 'Selected seat is not available.');
        }
    }

    // Helper method to check if a seat is available for a given trip
    private function isSeatAvailable($tripId, $seatNumber)
    {
        $bookedSeats = SeatAllocation::where('trip_id', $tripId)->pluck('seat_number')->toArray();
        return !in_array($seatNumber, $bookedSeats);
    }

    // Show a list of purchased tickets
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }
}
