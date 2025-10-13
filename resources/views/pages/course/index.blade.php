@extends('master.main')
@section('content')
    @component('components.course.form-list', ['courses' => $courses])
    @endcomponent
@endsection