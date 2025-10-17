<div class="container mt-4">
    <h1>Create New School</h1>
    <form action="{{ route('schools.store', [], false) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>City</label>
            <input type="text" name="city" class="form-control" required>
        </div>
        <a href="{{ route('schools.index') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
