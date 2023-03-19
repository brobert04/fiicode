
@component('mail::message')
<h1>Hello!</h1>

<p>Thank you for registering with Medicool. Please click on the link below to create your account</p>
@component('mail::button', ['url' => $link])
    Create Account
@endcomponent
@endcomponent
