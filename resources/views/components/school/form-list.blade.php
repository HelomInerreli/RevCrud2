<div class="container mt-4">
    <div class="row">
        <div class="col-10">
            <h1 class="text-center text-primary">SCHOOL LIST</h1>
        </div>
        <div class="col-2">
            <a href="{{ url('schools/create') }}" class="btn btn-success mb-3">New School</a>
        </div>
    </div>

    <form action="{{ route('schools.index') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search schools..."
                aria-label="Search schools" aria-describedby="button-addon2" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                @if (request('search'))
                    <a href="{{ route('schools.index') }}" class="btn btn-outline-danger">Clear</a>
                @endif
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
        </thead>
        @foreach ($schools as $school)
            <tr>
                <td>{{ $school->id }}</td>
                <td>{{ $school->name }}</td>
                <td>{{ $school->city }}</td>
                <td>
                    <a href="{{ route('schools.show', $school->id) }}" class="btn btn-outline-success">Show</a>
                    <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-outline-primary">Edit</a>
                    <form action="{{ route('schools.destroy', $school->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger"
                            onclick="return confirm('Sure to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $schools->links() }}
</div>
