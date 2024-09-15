
@extends ('layout.master')
 @section ('title,Create New lawsuit')

 @section ('content')

   @include ('lawsuits.form',['action'=>route('lawsuits.store')])


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
