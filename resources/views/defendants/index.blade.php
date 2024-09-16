@extends('layout.master')

@section('title', 'defendants')

@section('content')

<!-- <a href="{{ route('defendants.create') }}" class="btn btn-outline-secondary">Add defendant</a> -->

<form class="row flex g-3 justify-content-center" action="{{ route('defendants.index') }}" method="GET">  
    <div class="col">
        <x-textfield name="search" label="" type="text" placeholder="Enter defendant name or email" :value="old('search', '')" />
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
    @foreach ($defendants as $defendant)
      <tr>
        <td>{{ $defendant->name }}</td>
        <td>{{ $defendant->phone}}</td>
        <td>{{ $defendant->email}}</td>

        <td>
          <a href="{{ route('defendants.show', $defendant->id) }}" class="btn btn-outline-secondary">View</a>
          <a href="{{ route('defendants.edit', $defendant->id) }}" class="btn btn-outline-success">Edit</a>
          <x-deleteButton :action="route('defendants.destroy', $defendant->id)" />

          @method('DELETE')
          @csrf
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

  <div class=" d-flex justify-content-center">
    {{ $defendants->links() }}
</div>


@endsection

