@extends('master.main')
@section('content')
    @component('components.course.form-edit', ['course' => $course, 'teachers' => $teachers])
    @endcomponent
@endsection