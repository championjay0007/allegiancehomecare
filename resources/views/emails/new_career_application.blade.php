@component('mail::message')
# New Career Application Received

A new application has been submitted for **{{ $application->job_position }}**.

**Applicant Details:**
- Name: {{ $application->first_name }} {{ $application->last_name }}
- Email: {{ $application->email }}
- Phone: {{ $application->phone ?? 'Not provided' }}
- Work Eligibility: {{ $application->is_australian_citizen_or_pr ? 'Australian Citizen/PR' : 'Visa Holder' }}
@if(!$application->is_australian_citizen_or_pr)
- Visa Type: {{ $application->visa_type }}
- Valid Working Visa: {{ $application->has_valid_working_visa ? 'Yes' : 'No' }}
@endif

**Reference:**
@if($application->reference_name)
- Name: {{ $application->reference_name }}
- Relationship: {{ $application->reference_relationship }}
- Phone: {{ $application->reference_phone }}
@else
No reference provided
@endif

@component('mail::button', ['url' => url('/admin/careers/' . $application->id)])
View Application
@endcomponent

Submitted at: {{ $application->created_at->format('F j, Y \a\t g:i a') }}
@endcomponent