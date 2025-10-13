@extends('master.main')
@section('content')
    @component('components.teacher.form-show', ['teacher' => $teacher])
    @endcomponent
@endsection