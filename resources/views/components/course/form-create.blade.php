<div class="container mt-4">
    <h1>Create New Course</h1>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="row justify-content-start">
            <div class="mb-3 ml-3">
                <label>Teacher</label>
                <select name="teacher_id" class="form-control" required>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 ml-5">
                <label>Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="mb-3 ml-5">
                <label>Category</label>
                <input type="text" name="category" class="form-control" required>
            </div>
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
        <button class="btn btn-success">Save</button>
    </form>
</div>