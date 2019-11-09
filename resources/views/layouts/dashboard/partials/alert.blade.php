@php
    $successMessage = session()->pull('success');
    $dangerMessage = session()->pull('danger');
@endphp

@if($successMessage)
<div class="alert alert-success" role="alert">
    {{ $successMessage }}
</div>
@endif

@if($dangerMessage)
<div class="alert alert-danger" role="alert">
    {{ $dangerMessage }}
</div>
@endif