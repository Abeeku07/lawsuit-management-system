
@extends ('layout.master')
 @section ('title,Create New Applicant')

 @section ('content')

   @include ('applicants.form',['action'=>route('applicants.store')])


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
