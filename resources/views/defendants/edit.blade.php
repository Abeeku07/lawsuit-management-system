@extends('layout.master')
@section('title', 'Edit ' . $defendant->name)

@section('content')
    @include('defendants.form', [
        'action' => route('defendants.update', $defendant->id),
        'edit' => true,
        'defendant' => $defendant
    ])
@endsection
