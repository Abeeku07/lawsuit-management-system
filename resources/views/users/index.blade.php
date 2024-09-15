<!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->

@extends('layout.master')


<!-- this method works for only "one-liners" -->
@section('title','Users') 

@section('content')


<table class="table table-hover">
  <thead>
  <a href="{{route('users.create')}}" class="btn btn-outline-secondary">Add User</a>
    <tr>
    <th scope="col">User ID</th>
      <th scope="col">Full Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    
    <tr>
      <th scope="row">{{$user->user_id}}</th>
      <td>{{$user->fullname}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->role}}</td>
      <td>
        <a href="{{route('users.show', $user->id)}}" class="btn btn-outline-secondary">View</a>
        <a href="{{route('users.edit', $user->id)}}"class="btn btn-outline-success">Edit</a>
        <a href="{{route('users.destroy', $user->id)}}" class="btn btn-outline-danger">Delete</a>
      </td>
    </tr>
  
    @endforeach
  </tbody>
  </table>

@endsection


