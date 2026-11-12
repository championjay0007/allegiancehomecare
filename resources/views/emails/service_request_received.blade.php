@component('mail::message')
# Thank You for Your Service Request

Dear {{ $request->full_name }},

We've received your request for **{{ ucfirst(str_replace('_', ' ', $request->service_type)) }}** services. Here are the details:

- **Request ID:** {{ $request->id }}
- **Service Type:** {{ ucfirst(str_replace('_', ' ', $request->service_type)) }}
- **Submitted On:** {{ $request->created_at->format('F j, Y') }}

Our team will review your request and contact you within 24-48 hours. If you have any urgent questions, please don't hesitate to contact us at admin@allegiancehearthomecare.com.au.

@component('mail::button', ['url' => url('/')])
Visit Our Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent