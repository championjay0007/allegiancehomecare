@component('mail::message')
# Additional Information Required

Dear {{ $application->first_name }},

We are reviewing your application for the **{{ $application->job_position }}** position at Allegiance Heart & Home Care and need some additional information.

{{ $message }}

Please reply to this email with the requested information.

Kind regards,<br>
Allegiance Heart & Home Care
@endcomponent
