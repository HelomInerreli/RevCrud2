<div class="container mt-4">
    <h1>Teacher #{{ $teacher->id }}</h1>
    <p><strong>School:</strong> {{ $teacher->school->name }}</p>
    <p><strong>First Name:</strong> {{ $teacher->first_name }}</p>
    <p><strong>Last Name:</strong> {{ $teacher->last_name }}</p>
    <p><strong>Hire Date:</strong> {{ $teacher->hire_date }}</p>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back</a>
</div>