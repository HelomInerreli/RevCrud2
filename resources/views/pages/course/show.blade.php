@extends('master.main')
@section('content')
    @component('components.course.form-show', ['course' => $course])
    @endcomponent
@endsection