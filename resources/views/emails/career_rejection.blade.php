@component('mail::message')
# Application Update

Dear {{ $application->first_name }},

Thank you for your interest in the **{{ $application->job_position }}** position at {{ config('app.name') }}.

After careful consideration, we regret to inform you that we have decided to proceed with other candidates whose qualifications more closely match our current needs.

@if($message)
**Feedback:**  
{{ $message }}
@endif

We appreciate the time and effort you invested in your application and encourage you to apply for future positions that may be a better fit for your skills and experience.

Thank you again for your interest in our organization.

Best regards,  
{{ config('app.name') }} Team
@endcomponent