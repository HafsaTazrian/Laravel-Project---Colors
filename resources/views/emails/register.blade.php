@component('mail::message')

<p>Hello {{ $user->name }},</p> <!-- name parameter was sent to this function-->

@component('mail::button',['url'=> url('verify/'.$user->remember_token)])
Verify
@endcomponent

<p>Having problem? Let us know in the CONTACT US form.</p>

Thanks! <br />
{{ config('app.name') }}

@endcomponent