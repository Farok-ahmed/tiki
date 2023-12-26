<h1>Create a New Trip</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trips.store') }}" method="post">
        @csrf

        <label for="trip_date">Select Date:</label>
        <input type="date" id="trip_date" name="trip_date" required>

        <label for="location_id">Select Location:</label>
        <select id="location_id" name="location_id" required>
            @foreach ($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>

        <!-- Add other form fields as needed -->

        <button type="submit">Create Trip</button>
    </form>
