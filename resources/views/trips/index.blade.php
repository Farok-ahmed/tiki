<h1>Trips</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach ($trips as $trip)
            <li>
                {{ $trip->trip_date }} -
                <a href="{{ route('trips.show', $trip->id) }}">View</a> |
                {{-- <a href="{{ route('trips.edit', $trip->id) }}">Edit</a> | --}}
                {{-- <form action="{{ route('trips.destroy', $trip->id) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure?')">Delete</button>
                </form> --}}
            </li>
        @endforeach
    </ul>

    <a href="{{ route('trips.create') }}">Create a New Trip</a>
