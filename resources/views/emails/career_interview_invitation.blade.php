@component('mail::message')
# Interview Invitation

Dear {{ $application->first_name }},

Thank you for your application for the **{{ $application->job_position }}** position at {{ config('app.name') }}.

We would like to invite you for an interview on:

**Date:** {{ $interviewDate }}  
**Location:** [Interview Location]  

@if($message)
**Additional Notes:**  
{{ $message }}
@endif

Please confirm your availability by replying to this email.

We look forward to meeting you!

Kind regards,  
{{ config('app.name') }} Team
@endcomponent