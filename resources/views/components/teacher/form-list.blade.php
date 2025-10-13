<div class="container mt-4">
	<div class="row">
		<div class="col-10">
			<h1 class="text-center text-primary">TEACHER LIST</h1>
		</div>
		<div class="col-2">
			<a href="{{ url('teachers/create') }}" class="btn btn-success mb-3">New Teacher</a>
		</div>
	</div>

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
		@foreach($teachers as $teacher)
			<tr>
				<td>{{ $teacher->id }}</td>
				<td>{{ $teacher->school->name }}</td>
				<td>{{ $teacher->first_name }}</td>
				<td>{{ $teacher->last_name }}</td>
				<td>
					<a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-outline-success">Show</a>
					<a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-outline-primary">Edit</a>
					<form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-outline-danger" onclick="return confirm('Sure to delete?')">Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
	</table>

	{{ $teachers->links() }}
</div>