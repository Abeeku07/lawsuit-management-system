@extends('layout.master')

@section('title', 'Lawsuits')

@section('content')

<a href="{{ route('lawsuits.create') }}" class="btn btn-outline-secondary">Add Lawsuit</a>

<form class="row flex g-3 justify-content-center" action="{{ route('lawsuits.index') }}" method="GET">  
    <div class="col">
        <x-textfield name="search" label="Search for a lawsuit" type="text" placeholder="Enter lawsuit name or citation" :value="old('search', '')" />
    </div>
    <div class="col">
        <button class="btn btn-success" type="submit">Search</button>
    </div>
</form>

<table class="table table-hover mt-4">
  <thead>
    <tr>
      <th scope="col">Lawsuit ID</th>
      <th scope="col">Lawsuit Name</th>
      <th scope="col">Citation</th>
      <th scope="col">Court</th>
      <th scope="col">Applicant</th>
      <th scope="col">Defendant</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lawsuits as $lawsuit)
      <tr>
      <th scope="row">{{ $lawsuit->id }}</th>
        <td>{{ $lawsuit->lawsuit_name }}</td>
        <td>{{ $lawsuit->citation }}</td>
        <td>{{ $lawsuit->court->name }}</td>
        <td>{{ $lawsuit->applicant->name }}</td>
        <td>{{ $lawsuit->defendant->name }}</td>
        <td>
          <a href="{{ route('lawsuits.show', $lawsuit->id) }}" class="btn btn-outline-secondary">View</a>
          <a href="{{ route('lawsuits.edit', $lawsuit->id) }}" class="btn btn-outline-success">Edit</a>
          <x-deleteButton :action="route('lawsuits.destroy', $lawsuit->id)" />
          @method('DELETE')
          @csrf
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
  <!-- Pagination Links -->
  <div class=" d-flex justify-content-center">
    {{ $lawsuits->links() }}
</div>

@endsection
