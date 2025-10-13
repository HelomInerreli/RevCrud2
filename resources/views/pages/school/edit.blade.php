@extends('master.main')
@section('content')
    @component('components.school.form-edit', ['school' => $school])
    @endcomponent
@endsection