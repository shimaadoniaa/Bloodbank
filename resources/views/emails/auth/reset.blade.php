@component('mail::message')
# Introduction

Blood Bank Reset Password

Hello {{$client->name}}


<p>Your Reset Password Code Is: {{$code}}</p>


@component('mail::button', ['url' => 'http://ipda3.com','color'=>'success'])
Reset
@endcomponent


Thanks,<br>
{{ config('Blood Bank') }}
@endcomponent
