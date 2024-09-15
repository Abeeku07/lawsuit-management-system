@extends('layout.master')
@section('title', 'Edit ' . $applicant->name)

@section('content')
    @include('applicants.form', [
        'action' => route('applicants.update', $applicant->id),
        'edit' => true,
        'applicant' => $applicant
    ])
@endsection
