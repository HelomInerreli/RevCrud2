@extends('master.main')
@section('content')
    @component('components.teacher.form-create', ['schools' => $schools])
    @endcomponent
@endsection
