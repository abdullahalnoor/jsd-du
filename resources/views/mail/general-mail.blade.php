@component('mail::message')

# {{$subject}}


@if ($user->name)
Hello ,
 {{ $user->name }} .
@endif

{!! $mail_body !!}



 




{{-- <br>account verification  --}}
{{-- <small>Web Service Provided By </small>: <a href="http://phoenixsoftbd.com/">Phoenix Software</a> --}}
<br>
Sincerely,<br>
{{ config('app.name') }}
<br>

@endcomponent
