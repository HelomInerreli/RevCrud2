@extends('master.main')
@section('content')
    @component('components.school.form-list', ['schools' => $schools])
    @endcomponent
@endsection