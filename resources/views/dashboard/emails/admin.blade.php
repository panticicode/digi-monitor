@component('mail::table')
# The member birthdate on {{ $date }}

@component('mail::table')
| Name | Surname | Phone | Email | Date Of Birth |
| :--: | :-----: | :---: | :---: | :-----------: |
@foreach($params as $member)
| {{ $member->name }} | {{ $member->surname }} | {{ $member->phone }} | {{ $member->email }} | {{ $member->date_of_birth }} |
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent