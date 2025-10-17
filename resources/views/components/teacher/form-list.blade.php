<div class="container mt-4">
    <div class="row">
        <div class="col-10">
            <h1 class="text-center text-primary">TEACHER LIST</h1>
        </div>
        <div class="col-2">
            <a href="{{ url('teachers/create') }}" class="btn btn-success mb-3">New Teacher</a>
        </div>
    </div>

    <form action="{{ route('teachers.index') }}" method="GET" class="mb-3">
        <div class="row g-2 align-items-end">
            <div class="col-md-4">
                <label for="school_id" class="form-label">Filter by School</label>
                <select name="school_id" id="school_id" class="form-control">
                    <option value="">All schools</option>
                    @foreach ($schools ?? [] as $school)
                        <option value="{{ $school->id }}"
                            {{ (string) ($selectedSchoolId ?? '') === (string) $school->id ? 'selected' : '' }}>
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-outline-secondary">Apply</button>
                @if (!empty($selectedSchoolId))
                    <a href="{{ route('teachers.index') }}" class="btn btn-outline-danger">Clear</a>
                @endif
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>School</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ optional($teacher->school)->name ?? '-' }}</td>
                <td>{{ $teacher->first_name }}</td>
                <td>{{ $teacher->last_name }}</td>
                <td>
                    <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-outline-success">Show</a>
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-outline-primary">Edit</a>
                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger"
                            onclick="return confirm('Sure to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $teachers->appends(request()->only('school_id'))->links() }}
</div>
