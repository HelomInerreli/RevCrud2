@extends('master.main')
@section('content')
    @component('components.course.form-list', [
        'courses' => $courses,
        'teachers' => $teachers ?? collect(),
        'categories' => $categories ?? collect(),
        'selectedTeacherId' => $selectedTeacherId ?? null,
        'selectedCategory' => $selectedCategory ?? null,
    ])
    @endcomponent
@endsection
