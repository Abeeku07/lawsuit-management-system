@extends ('layout.master')
 @section ('title,Create New Defendant')

 @section ('content')

   @include ('defendants.form',['action'=>route('defendants.store')])


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
