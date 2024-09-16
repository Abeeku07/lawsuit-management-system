@extends('layout.master')

@section('title', $defendant->name)


@section('content')
<a href="{{ route('defendants.index') }}" class="btn btn-outline-secondary">Back to List</a>
<div class="container mt-4">
    <!-- defendant Details Section -->
    <div class="row mb-3">
        <div class="col-lg-12">
            <!-- <h1>defendant Details</h1> -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Name: {{ $defendant->name }}</h4>
                    <p><strong>Email:</strong> {{ $defendant->email }}</p>
                    <p><strong>Phone:</strong> {{ $defendant->phone }}</p>
                </div>
            </div>
        </div>
    </div>

   
    <!-- Edit, Back and Delete Buttons Section -->
   
</div>

 <!-- Lawsuits Involved Section -->
    <div class="row mb-3">
        <div class="col-lg-12">
            <!-- <h2>Lawsuits Involved</h2> -->
            @if($defendant->lawsuits->isEmpty())
                <p>No lawsuits found for this defendant.</p>
            @else
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Lawsuit Name</th>
                                    <th scope="col">Citation</th>
                                    <th scope="col">Court</th>
                                    <th scope="col">Applicant</th>
                                    <th scope="col">Date of Commencement</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($defendant->lawsuits as $lawsuit)
                                    <tr>
                                        <td>{{ $lawsuit->lawsuit_name }}</td>
                                        <td>{{ $lawsuit->citation }}</td>
                                        <td>{{ $lawsuit->court->name }}</td>
                                        <td>{{ $lawsuit->applicant->name }}</td>
                                        <td>{{ $lawsuit->doc }}</td>
                                        <td>
                                            <a href="{{ route('lawsuits.show', $lawsuit->id) }}" class="btn btn-outline-secondary btn-sm">View</a>

                                            <div>
        </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
