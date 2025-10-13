@extends('master.main')
@section('content')
    @component('components.teacher.form-edit', ['teacher' => $teacher, 'schools' => $schools])
    @endcomponent
@endsection