<div class="container mt-4">
    <h1>Course #{{ $course->id }}</h1>
    <p><strong>Title:</strong> {{ $course->title }}</p>
    <p><strong>Category:</strong> {{ $course->category }}</p>
    <p><strong>Price:</strong> ${{ $course->price }}</p>
    <p><strong>Teacher:</strong> {{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</p>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
</div>