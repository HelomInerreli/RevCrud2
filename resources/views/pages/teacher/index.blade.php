@extends('master.main')
@section('content')
    @component('components.teacher.form-list', ['teachers' => $teachers])
    @endcomponent
@endsection