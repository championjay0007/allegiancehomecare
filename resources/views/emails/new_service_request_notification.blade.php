@component('mail::message')
# New Service Request Received

A new service request has been submitted:

**Client Details:**
- Name: {{ $request->full_name }}
- Email: {{ $request->email }}
- Phone: {{ $request->phone }}
- Service Type: {{ ucfirst(str_replace('_', ' ', $request->service_type)) }}
- Journey Stage: {{ ucfirst($request->journey_stage) }}

**Additional Information:**
- Date of Birth: {{ $request->date_of_birth ? \Carbon\Carbon::parse($request->date_of_birth)->format('m/d/Y') : 'Not provided' }}
- Postcode: {{ $request->postcode }}
- Cultural Considerations: {{ $request->cultural_considerations ?? 'None provided' }}

@component('mail::button', ['url' => url('/admin/service-requests/'.$request->id)])
View Full Request Details
@endcomponent

Submitted at: {{ $request->created_at->format('F j, Y \a\t g:i a') }}
@endcomponent