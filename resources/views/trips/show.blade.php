<h1>Trip Details</h1>

    <p><strong>Date:</strong> {{ $trip->trip_date }}</p>
    <p><strong>Location:</strong> {{ $trip->location->name }}</p>
    <!-- Add other trip details as needed -->

    <a href="{{ route('trips.index') }}">Back to Trips</a>
