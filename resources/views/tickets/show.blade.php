{{-- <h1>Available Seats for {{ $trip->date }}</h1>

<ul>
    @foreach ($availableSeats as $seat)
        <li>
            Seat {{ $seat }} -
            <form action="{{ route('tickets.book', $trip) }}" method="post">
                @csrf
                <input type="hidden" name="seat_number" value="{{ $seat }}">
                <button type="submit">Book Seat</button>
            </form>
        </li>
    @endforeach
</ul> --}}
<h1>Check Available Seats</h1>

    <form action="{{ route('trips.checkAvailability') }}" method="post">
        @csrf
        <label for="trip_date">Select Date:</label>
        <input type="date" id="trip_date" name="trip_date" required>
        <button type="submit">Check Availability</button>
    </form>

    @if(isset($availableSeats))
        <h2>Available Seats:</h2>
        <p>{{ $availableSeats }} seats are available for the selected date.</p>
    @endif
