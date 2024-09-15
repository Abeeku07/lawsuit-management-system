
@extends ('layout.master')
 @section ('title,Create New Court')

 @section ('content')

   @include ('courts.form',['action'=>route('courts.store')])


   <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

 @endsection
