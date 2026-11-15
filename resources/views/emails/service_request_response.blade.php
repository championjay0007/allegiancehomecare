@component('mail::message')
@if($isAdminCopy)
# [Admin Copy] Response to Service Request

This is a copy of the response sent to {{ $request->full_name }} for your records.
@else
# Response to Your Service Request

Dear {{ $request->full_name }},

Thank you for your service request. Here is our response:
@endif

@component('mail::panel')
{{ $response }}
@endcomponent

@if(!$isAdminCopy)
If you have any further questions, please don't hesitate to contact us.

<!-- @component('mail::button', ['url' => url('/admin/service-requests/' . $request->id)])
Visit Your Dashboard -->
@endcomponent
@endif

Thanks,<br>
Allegiance Heart & Home Care
@endcomponent