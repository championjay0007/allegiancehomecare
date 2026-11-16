@component('mail::message')
# New {{ $requestType }}

- Name: {{ $brochureRequest->first_name }} {{ $brochureRequest->last_name }}
- Email: {{ $brochureRequest->email }}
- Phone: {{ $brochureRequest->phone }}
- Submitted: {{ $brochureRequest->created_at->toDayDateTimeString() }}

@endcomponent
