@extends('master.main')
@section('content')
    @component('components.teacher.form-list', [
        'teachers' => $teachers,
        'schools' => $schools ?? collect(),
        'selectedSchoolId' => $selectedSchoolId ?? null,
    ])
    @endcomponent
@endsection
