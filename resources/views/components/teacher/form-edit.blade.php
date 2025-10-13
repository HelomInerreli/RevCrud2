<div class="container mt-4">
    <h1>Create New Teacher</h1>
    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div class="row justify-content-start">
            <div class="mb-3 ml-3">
                <label>School</label>
                <select name="school_id" class="form-control" required>
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}" {{ $teacher->school_id == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 ml-5">
                <label>Hire Date</label>
                <input type="date" name="hire_date" class="form-control" value="{{ $teacher->hire_date }}" required>
            </div>
        </div>
        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $teacher->first_name }}" required>
        </div>
        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $teacher->last_name }}" required>
        </div>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back</a>
        <button class="btn btn-success">Save</button>
    </form>
</div>