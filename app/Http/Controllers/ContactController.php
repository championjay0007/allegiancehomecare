<?php

namespace App\Http\Controllers;

use App\Mail\AdminContactNotification;
use App\Mail\ContactFormConfirmation;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $businessHours = [
            'Monday - Friday' => '9:00 AM - 6:00 PM',
            'Saturday' => '10:00 AM - 4:00 PM',
            'Sunday' => 'Closed',
        ];

        return view('contact', compact('businessHours'));
    }

    public function send(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'message' => 'required|string|min:10',
            ]);

            $contact = Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'message' => $validated['message'],
                'status' => 'new',
            ]);

            Mail::to($contact->email)->send(new ContactFormConfirmation($contact));
            $adminAddress = config('mail.admin_address') ?: config('mail.from.address');
            Mail::to($adminAddress)->send(new AdminContactNotification($contact));

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! We will get back to you soon.',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Please fix the errors in the form.',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again later.',
            ], 500);
        }
    }
}
