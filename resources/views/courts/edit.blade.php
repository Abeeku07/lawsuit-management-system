@extends('layout.master')
@section('title', 'Edit ' . $court->name)

@section('content')
    @include('courts.form', [
        'action' => route('courts.update', $court->id),
        'edit' => true,
        'court' => $court
    ])
@endsection