<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceRequestReceived;
use App\Mail\NewServiceRequestNotification;




class BookingController extends Controller
{

    const COMPLETING_FOR = [
    'self' => 'Myself',
    'someone_else' => 'Someone Else',
];

const GENDER_OPTIONS = [
        'male' => 'Male',
        'female' => 'Female',
        'other' => 'Other',
    ];
    public function showForm()
    {
        return view('booking.form');
    }

  public function submitForm(Request $request)
{
    try {
        $consent = request()->has('consent') ? 1 : 0;
        $validated = $request->validate([
    // Step 1: Service Type
    'service_type' => 'required|in:aged_care,disability,home_care,ndis',

    // Step 2: Personal Details
    'completing_as' => 'required|in:participant,family,coordinator,other',
    'other_role' => 'nullable|string|max:255',
    'full_name' => 'required|string|max:255',
    'phone' => 'required|string|max:20',
    'email' => 'required|email|max:255',
    'postcode' => 'required|string|max:10',
    'suburb' => 'required|string|max:100',
    'state' => 'required|in:NSW,VIC,QLD,SA,WA,TAS,NT,ACT',
    'ndis_number' => 'nullable|string|max:20',
    'hcp_id' => 'nullable|string|max:20',
    'additional_info' => 'nullable|string|max:1000',
    'referral_source' => 'nullable|string|max:255',
    'consent' => 'required|accepted',

    
]);
 $validated['consent'] = $request->has('consent') ? 1 : 0;


        $serviceRequest = ServiceRequest::create($validated);

        // Confirmation email to user
        Mail::to($validated['email'])->send(new ServiceRequestReceived($serviceRequest));

        // Notification email to admin
        Mail::to(config('mail.from.address'))->send(new NewServiceRequestNotification($serviceRequest));

     return response()->json([
         'success' => true,
         'redirect' => route('booking.thank-you', [
             'type' => 'booking',
             'service_type' => $validated['service_type'],
         ]),
     ]);

    } catch (ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Please correct the errors in the form.',
            'errors' => $e->validator->errors()->toArray()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred. Please try again.',
            'error' => $e->getMessage()
        ], 500);
    }
}

}