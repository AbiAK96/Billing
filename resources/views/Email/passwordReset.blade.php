@component('mail::message')
# Password Reset

Dear Sir,

If you have lost your password or wish to reset it, use the link below to get started.

@component('mail::button', ['url' => env('BASE_URL').'/auth/reset-password/?token=' . $token . '&email=' . $email])
Reset Password
@endcomponent

Thank you,<br>
Sincerely,<br>
@endcomponent
