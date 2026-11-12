@component('mail::layout')
@slot('header')
@component('mail::header', ['url' => config('app.url')])
New Contact Submission - {{ config('app.name') }}
@endslot
@endcomponent

@component('mail::panel', ['color' => '#E53935'])
<h1 style="color: #E53935; text-align: center;">New Contact Form Submission</h1>
@endcomponent

@component('mail::table')
| Detail          | Information |
|-----------------|-------------|
| **Name**        | {{ $contact->name }} |
| **Email**       | {{ $contact->email }} |
| **Phone**       | {{ $contact->phone ?? 'Not provided' }} |
| **Subject**     | {{ $contact->subject }} |
| **Message**     | {{ $contact->message }} |
| **Received**    | {{ $contact->created_at->format('M j, Y \a\t g:i A') }} |
@endcomponent

@component('mail::button', ['url' => url('/admin/contacts/'.$contact->id), 'color' => '#1DBFAD'])
View in Admin Panel
@endcomponent

@component('mail::button', ['url' => 'mailto:'.$contact->email.'?subject=Re: '.$contact->subject, 'color' => '#004E92'])
Reply Directly
@endcomponent

@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent