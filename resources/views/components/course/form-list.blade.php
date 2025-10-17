<div class="container mt-4">
    <div class="row">
        <div class="col-10">
            <h1 class="text-center text-primary">COURSE LIST</h1>
        </div>
        <div class="col-2">
            @auth
                <a href="{{ url('courses/create') }}" class="btn btn-success mb-3">New Course</a>
            @endauth
        </div>
    </div>

    <form action="{{ route('courses.index') }}" method="GET" class="mb-3">
        <div class="row g-2 align-items-end">
            <div class="col-md-4">
                <label for="teacher_id" class="form-label">Teacher</label>
                <select name="teacher_id" id="teacher_id" class="form-control">
                    <option value="">All teachers</option>
                    @foreach ($teachers ?? [] as $teacher)
                        <option value="{{ $teacher->id }}"
                            {{ (string) ($selectedTeacherId ?? '') === (string) $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->first_name }} {{ $teacher->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="">All categories</option>
                    @foreach ($categories ?? [] as $cat)
                        <option value="{{ $cat }}"
                            {{ (string) ($selectedCategory ?? '') === (string) $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-outline-secondary">Apply</button>
                @if (!empty($selectedTeacherId) || !empty($selectedCategory))
                    <a href="{{ route('courses.index') }}" class="btn btn-outline-danger">Clear</a>
                @endif
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Teacher Name</th>
                <th>Title</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ optional($course->teacher)->first_name }} {{ optional($course->teacher)->last_name }}</td>
                <td>{{ $course->title }}</td>
                <td>{{ $course->category }}</td>
                <td>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-success">Show</a>
                    @auth
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-outline-primary">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"
                                onclick="return confirm('Sure to delete?')">Delete</button>
                        </form>
                    @endauth
                </td>
            </tr>
        @endforeach
    </table>

    {{ $courses->appends(request()->only(['teacher_id', 'category']))->links() }}
</div>
