<div class="container mt-4">
    <h1>Edit School #{{ $school->id }}</h1>
    <form action="{{ route('schools.update', $school->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $school->name }}" required>
        </div>
        <div class="mb-3">
            <label>City</label>
            <input type="text" name="city" class="form-control" value="{{ $school->city }}" required>
        </div>
        <a href="{{ route('schools.index') }}" class="btn btn-secondary">Back</a>
        <button class="btn btn-success">Save</button>
    </form>
</div>