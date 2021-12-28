@component('mail::message')
# Welcome to {{ config('app.name') }}

Please click on the link above to activate your account.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
