@extends('layout.master')

@section('title', 'courts')

@section('content')

<a href="{{ route('courts.create') }}" class="btn btn-outline-secondary">Add court</a>

<form class="row flex g-3 justify-content-center" action="{{ route('courts.index') }}" method="GET">  
    <div class="col">
        <x-textfield name="search" label="Search for a court" type="text" placeholder="Enter court name" :value="old('search', '')" />
    </div>
    <div class="col">
        <button class="btn btn-success" type="submit">Search</button>
    </div>
</form>

<table class="table table-hover mt-4">
  <thead>
    <tr>

      <th scope="col">Name</th>
      <th scope="col">Location</th>
      <th scope="col">Jurisdiction</th>
      <th scope="col">Actions</th>
    
    </tr>
  </thead>
  <tbody>
    @foreach ($courts as $court)
      <tr>
       
        <td>{{ $court->name }}</td>
        <td>{{ $court->location}}</td>
        <td>{{ $court->jurisdiction}}</td>

        <td>
          <a href="{{ route('courts.show', $court->id) }}" class="btn btn-outline-secondary">View</a>
          <a href="{{ route('courts.edit', $court->id) }}" class="btn btn-outline-success">Edit</a>
          <x-deleteButton :action="route('courts.destroy', $court->id)" />

          @method('DELETE')
          @csrf
        </td>
      </tr>
    @endforeach
  </tbody>
</table>


@endsection
