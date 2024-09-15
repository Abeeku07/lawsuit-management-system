@extends('layout.master')
@section('title', 'Edit ' . $lawsuit->name)

@section('content')
    @include('lawsuits.form', [
        'action' => route('lawsuits.update', $lawsuit->id),
        'edit' => true
    ])
@endsection