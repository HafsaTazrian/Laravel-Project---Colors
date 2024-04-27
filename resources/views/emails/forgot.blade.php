@component('mail::message')

<p>Hello {{ $user->name }},</p> <!-- name parameter was sent to this function-->
<p>Forgot your password? Reset it now.</p>

@component('mail::button',['url'=> url('reset/'.$user->remember_token)])
Reset Password
@endcomponent

<p>Having problem to reset password? Let us know in the CONTACT US form.</p>

Thanks! <br />
{{ config('app.name') }}

@endcomponent