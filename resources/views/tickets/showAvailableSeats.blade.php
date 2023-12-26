<h1>Check Available Seats</h1>

<form action="{{ route('tickets.checkAvailability') }}" method="post">
    @csrf
    <label for="trip_id">Select Trip:</label>
    <select name="trip_id" id="trip_id" required>
        {{-- Populate with available trips --}}
        @foreach ($trips as $trip)
            <option value="{{ $trip->id }}">{{ $trip->trip_date }} - {{ $trip->location->name }}</option>
      @endforeach
    </select>

    <button type="submit">Check Availability</button>
</form>

@if(isset($availableSeats))
    <h2>Available Seats:</h2>
    @if(count($availableSeats) > 0)
        <p>{{ implode(', ', $availableSeats) }} seats are available for the selected trip.</p>
    @else
        <p>No seats are available for the selected trip.</p>
    @endif
@endif
