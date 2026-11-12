@component('mail::message')
# Additional Information Requested

Dear {{ $application->first_name }},

Thank you for your application for the **{{ $application->job_position }}** position at {{ config('app.name') }}.

We require some additional information to process your application:

{{ $message }}

Please reply to this email with the requested information at your earliest convenience.

Thank you for your cooperation.

Kind regards,  
{{ config('app.name') }} Team
@endcomponent