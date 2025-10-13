@extends('master.main')
@section('content')
    @component('components.course.form-create', ['teachers' => $teachers])
    @endcomponent
@endsection