@component('mail::message')
# New Career Application Received

A new application has been submitted for **{{ $application->job_position }}**.

**Applicant Details:**
- Name: {{ $application->first_name }} {{ $application->last_name }}
- Email: {{ $application->email }}
- Phone: {{ $application->phone }}
- Preferred Location: {{ $application->preferred_location }}
- Employment Type: {{ $application->employment_type_preference }}
- Work Rights: {{ $application->work_rights }}
- Availability: {{ $application->availability }}
- How They Heard About Us: {{ $application->referral_source }}

@if($application->cover_letter)
**Cover Note:**
{{ $application->cover_letter }}
@endif

@component('mail::button', ['url' => url('/admin/careers/' . $application->id)])
View Application
@endcomponent

Submitted at: {{ $application->created_at->format('F j, Y \a\t g:i a') }}
@endcomponent