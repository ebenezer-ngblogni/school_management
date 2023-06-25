@component('mail::message')
Salut {{ $user->name }},

<p>Pour réinitialiser votre mot de passe veuillez cliquez sur le lien ci-dessous. </p>

@component('mail::button', ['url' => url('reset/' .$user->remember_token)])
Reset your Password
@endcomponent

<p>En cas de difficultés à réinitialiser votre mot de passe, veuillez nous contacter. </p>

Merci,<br>
{{ config('app.name') }}
@endcomponent
