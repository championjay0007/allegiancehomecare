@component('mail::message')
# Thank You for Your Application

Dear {{ $application->first_name }},

We've received your application for the **{{ $application->job_position }}** position at {{ config('app.name') }}.

**Application Details:**
- Name: {{ $application->first_name }} {{ $application->last_name }}
- Position: {{ $application->job_position }}
- Submitted: {{ $application->created_at->format('F j, Y \a\t g:i a') }}

Our team will review your application and get back to you soon. If you have any questions, please don't hesitate to contact us.

@component('mail::button', ['url' => url('/contact')])
Contact Us
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent