@extends('layout.master')

@section('title', 'Lawsuit Details')

@section('content')
<div class="container mt-4">
    <!-- Lawsuit Details Section -->
    <div class="row mb-3">
        <div class="col-lg-12">
            <h1>Lawsuit Details</h1>
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Lawsuit Name: {{ $lawsuit->lawsuit_name }}</h4>
                    <p><strong>Citation:</strong> {{ $lawsuit->citation }}</p>
                    <p><strong>Date of Commencement:</strong> {{ $lawsuit->doc }}</p>
                    <p><strong>Court:</strong> {{ $lawsuit->court->name }}</p>
                    <p><strong>Applicant:</strong> {{ $lawsuit->applicant->name }}</p>
                    <p><strong>Defendant:</strong> {{ $lawsuit->defendant->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit, Back and Delete Buttons Section -->
<div class="container mt-4">
    <a href="{{ route('lawsuits.edit', $lawsuit->id) }}" class="btn btn-outline-success">Edit Lawsuit</a>
  
    <form action="{{ route('lawsuits.destroy', $lawsuit->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">Delete Lawsuit</button>
    </form>
    <a href="{{ route('lawsuits.index') }}" class="btn btn-outline-secondary">Back to List</a>
</div>

@endsection
