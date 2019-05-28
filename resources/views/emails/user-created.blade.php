@component('mail::message')
# Introduction

Hi,

An administrator has just creatd a new account for you.

## Credentials
Username: {{ $user->email}}
Password: click below to define your new password (it expires in 24h)

@component('mail::button', ['url' => route('password.reset')])
Choose your password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
