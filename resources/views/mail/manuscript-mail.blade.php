@component('mail::message')

# {{$subject}}



Hello ,
 {{ $name }} .


{!! $mail_body !!}



 




{{-- <br>account verification  --}}
{{-- <small>Web Service Provided By </small>: <a href="http://phoenixsoftbd.com/">Phoenix Software</a> --}}
<br>
Sincerely,<br>
{{ config('app.name') }}
<br>

@endcomponent
