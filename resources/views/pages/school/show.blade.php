@extends('master.main')
@section('content')
    @component('components.school.form-show', ['school' => $school])
    @endcomponent
@endsection