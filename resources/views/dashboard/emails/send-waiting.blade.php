@component('mail::message')
Mail of Group

<strong>{{ __('Name') }}:</strong> {{ $name }}

<strong>{{ __('Subject') }}:</strong> {{ $subject }}

<strong>{{ __('Content') }}:</strong> {{ $content }}

Hi Dear **{{ $name }}**,  {{-- use double space for line break --}}
Thank you for choosing are Digi-Monitor App V2.0!

Click below to start working with as
@component('mail::button', ['url' => $link])
Quick Check This Link
@endcomponent
Sincerely,  
your Digi-Monitor App team.
@endcomponent

