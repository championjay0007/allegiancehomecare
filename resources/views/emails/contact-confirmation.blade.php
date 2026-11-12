@component('mail::layout')
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endslot
@endcomponent

@component('mail::panel', ['color' => '#1DBFAD'])
<h1 style="color: #1DBFAD; text-align: center; margin-bottom: 20px;">Thank You For Contacting Us!</h1>
@endcomponent

@component('mail::table')
| Detail          | Information |
|-----------------|-------------|
| **Name**        | {{ $contact->name }} |
| **Email**       | {{ $contact->email }} |
| **Phone**       | {{ $contact->phone ?? 'Not provided' }} |
| **Subject**     | {{ $contact->subject }} |
| **Message**     | {{ $contact->message }} |
@endcomponent

@component('mail::panel', ['color' => '#F8F9FA'])
<p style="text-align: center; color: #6C757D;">
    We've received your message and our team will get back to you within 24-48 hours.
</p>
@endcomponent

@component('mail::button', ['url' => config('app.url'), 'color' => '#1DBFAD'])
Visit Our Website
@endcomponent

@component('mail::subcopy')
If you didn't request this contact, please ignore this email.
@endcomponent

@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent