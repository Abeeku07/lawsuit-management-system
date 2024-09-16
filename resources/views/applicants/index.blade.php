@extends('layout.master')

@section('title', 'applicants')

@section('content')

<!-- <a href="{{ route('applicants.create') }}" class="btn btn-outline-secondary">Add applicant</a> -->

<form class="row flex g-3 justify-content-center" action="{{ route('applicants.index') }}" method="GET">  
    <div class="col">
        <x-textfield name="search" label="" type="text" placeholder="Enter applicant name or email" :value="old('search', '')" />
    </div>
    <div class="col">
        <button class="btn btn-success" type="submit">Search</button>
    </div>
</form>

<table class="table table-hover mt-4">
  <thead>
    <tr>

      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    
    </tr>
  </thead>
  <tbody>
    @foreach ($applicants as $applicant)
      <tr>
       
        <td>{{ $applicant->name }}</td>
        <td>{{ $applicant->phone}}</td>
        <td>{{ $applicant->email}}</td>

        <td>
          <a href="{{ route('applicants.show', $applicant->id) }}" class="btn btn-outline-secondary">View</a>
          <a href="{{ route('applicants.edit', $applicant->id) }}" class="btn btn-outline-success">Edit</a>
          <x-deleteButton :action="route('applicants.destroy', $applicant->id)" />

          @method('DELETE')
          @csrf
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<!-- Pagination Links -->
<div class=" d-flex justify-content-center">
    {{ $applicants->links() }}
</div>

@endsection
