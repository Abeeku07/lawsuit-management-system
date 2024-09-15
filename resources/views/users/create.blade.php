
 <!-- Life is available only in the present moment. - Thich Nhat Hanh -->


 @extends('layout.master')

@section('title','Create New User')

@section('content')
    @include('users.form',[ 'action' => route('users.store') ])
@endsection
