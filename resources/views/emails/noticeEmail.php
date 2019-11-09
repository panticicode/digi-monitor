@component('mail::message', ['user' => $user])
@markdown($params['content'])
@endcomponent