@component('mail::message', ['user' => $user])
Dear {{ $user->name }},

{{ $params }}
@endcomponent