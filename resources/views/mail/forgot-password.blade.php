@component('mail::message')

# {{$subject}}



@if ($user->name)
Hello ,
 {{ $user->name }} .
@endif
 you have made a request to change your Password in  {{ config('app.name') }} Web Portal ,
 Please go through the following link .

@component('mail::button', ['url' => $url])
Reset Password

@endcomponent
{{-- <br>account verification  --}}
{{-- <small>Web Service Provided By </small>: <a href="http://phoenixsoftbd.com/">Phoenix Software</a> --}}
<br>
Sincerely,<br>
{{ config('app.name') }}
<br>

@endcomponent
