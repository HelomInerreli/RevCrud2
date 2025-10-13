<div class="container mt-4">
    <h1>School #{{ $school->id }}</h1>
    <p><strong>Name:</strong> {{ $school->name }}</p>
    <p><strong>City:</strong> {{ $school->city }}</p>
    <a href="{{ route('schools.index') }}" class="btn btn-secondary">Back</a>
</div>