@component('mail::layout')
@slot('header')
@component('mail::header', ['url' => config('app.url')])
Allegiance Heart & Home Care - Response to Your Enquiry
@endslot
@endcomponent

@component('mail::panel', ['color' => '#1DBFAD'])
<h1 style="color: #1DBFAD; text-align: center;">Response to Your Enquiry</h1>
@endcomponent

<p style="font-size: 16px; line-height: 1.6; color: #1A1A1A;">
    Dear {{ $contact->name }},
</p>

<p style="font-size: 16px; line-height: 1.6; color: #1A1A1A;">
    Thank you for contacting us on {{ $contact->created_at->format('F j, Y') }}. 
    Here's our response to your enquiry:
</p>

@component('mail::panel', ['color' => '#F8F9FA'])
<h3 style="color: #1A1A1A; margin-top: 0;">Your Original Message:</h3>
<p style="font-style: italic;">{{ $contact->message }}</p>
@endcomponent

@component('mail::panel', ['color' => '#F8F9FA'])
<h3 style="color: #1A1A1A; margin-top: 0;">Our Response:</h3>
<p>{{ $response }}</p>
@endcomponent

@component('mail::button', ['url' => config('app.url'), 'color' => '#1DBFAD'])
Visit Our Website
@endcomponent

@component('mail::button', ['url' => 'mailto:'.config('mail.from.address'), 'color' => '#004E92'])
Contact Us Again
@endcomponent

@component('mail::footer')
© {{ date('Y') }} Allegiance Heart & Home Care. All rights reserved.
@endcomponent