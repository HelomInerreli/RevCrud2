<div class="container mt-4">
	<div class="row">
		<div class="col-10">
			<h1 class="text-center text-primary">COURSE LIST</h1>
		</div>
		<div class="col-2">
			<a href="{{ url('courses/create') }}" class="btn btn-success mb-3">New Course</a>
		</div>
	</div>

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
		@foreach($courses as $course)
			<tr>
				<td>{{ $course->id }}</td>
				<td>{{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</td>
				<td>{{ $course->title }}</td>
				<td>{{ $course->category }}</td>
				<td>
					<a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-success">Show</a>
					<a href="{{ route('courses.edit', $course->id) }}" class="btn btn-outline-primary">Edit</a>
					<form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-outline-danger" onclick="return confirm('Sure to delete?')">Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
	</table>

	{{ $courses->links() }}
</div>