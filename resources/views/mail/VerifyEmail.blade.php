@component('mail::message')
# Welcome Dear {{$user->name}}

Please click the link below to activate your profile

@component('mail::button', ['url' => route('verifyEmail',$user->user_token)])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
