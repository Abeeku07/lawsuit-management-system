<x-mail::message>
<x-mail::panel>
    <h1 style="color:black">Notice of Hearing: {{$lawsuit->lawsuit_name}} - {{$lawsuit->court->name}}</h1>
    <p style="color:blue">
        Dear {{ $applicant->name }},
    </p>
    <p>
        We wish to formally notify you that a hearing has been scheduled in the lawsuit <strong>"{{$lawsuit->lawsuit_name}}"</strong>, where you are listed as the applicant. The hearing will take place at <strong>{{$lawsuit->court->name}}</strong> located at <strong>{{$lawsuit->court->location}}</strong> on <strong>{{ $lawsuit->doc }}</strong>.
    </p>
    <p>
        The defendant in this case is <strong>{{ $defendant->name }}</strong>. It is important that you attend the hearing and provide any necessary documents or information related to the case.
    </p>
    <p>
        Should you have any questions or require further information prior to the hearing, please feel free to contact our office. We urge you to be punctual and well-prepared for the proceedings as failure to do so would have consequences.
    </p>
    <p style="color:blue">
        Sincerely,<br>
        Judicial Service, {{$lawsuit->court->name}}, Ghana
    </p>
</x-mail::panel>

<x-mail::button url="https://judicial.gov.gh/index.php" color="success"> Visit Our Homepage </x-mail::button>

</x-mail::message>
