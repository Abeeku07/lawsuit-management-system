@extends('layout.master')

@section('title', 'Court Details')

@section('content')
<a href="{{ route('courts.index') }}" class="btn btn-outline-secondary">Back to List</a>
<div class="container mt-4">
    <!-- Court Details Section -->
    <div class="row mb-3">
        <div class="col-lg-12">
            <h1>Court Details</h1>
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Name: {{ $court->name }}</h4>
                    <p><strong>Location:</strong> {{ $court->location }}</p>
                    <p><strong>Jurisdiction:</strong> {{ $court->jurisdiction }}</p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Lawsuits in this Court Section -->
<div class="container mt-4">
    
    @if($court->lawsuits->isEmpty())
        <p>No lawsuits found for this court.</p>
    @else
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Lawsuit Name</th>
                            <th scope="col">Citation</th>
                            <th scope="col">Applicant</th>
                            <th scope="col">Defendant</th>
                            <th scope="col">Date of Commencement</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($court->lawsuits as $lawsuit)
                            <tr>
                                <td>{{ $lawsuit->lawsuit_name }}</td>
                                <td>{{ $lawsuit->citation }}</td>
                                <td>{{ $lawsuit->applicant->name }}</td>
                                <td>{{ $lawsuit->defendant->name }}</td>
                                <td>{{ $lawsuit->doc }}</td>
                                <td>
                                    <a href="{{ route('lawsuits.show', $lawsuit->id) }}" class="btn btn-outline-secondary btn-sm">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
