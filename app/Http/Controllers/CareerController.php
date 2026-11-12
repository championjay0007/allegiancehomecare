<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\CareerApplicationReceived;
use App\Mail\NewCareerApplication;

class CareerController extends Controller
{
    public function index()
    {
        return view('careers.index');
    }

    public function submitApplication(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'referral_source' => 'nullable|string|max:255',
            'is_australian_citizen_or_pr' => 'required|boolean',
            'visa_type' => 'nullable|required_if:is_australian_citizen_or_pr,false|string|max:255',
            'has_valid_working_visa' => 'nullable|boolean',
            'reference_name' => 'nullable|string|max:255',
            'reference_relationship' => 'nullable|string|max:255',
            'reference_phone' => 'nullable|string|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|string',
            'job_position' => 'required|string|max:255',
        ]);

        // Store resume
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Create application
        $application = Career::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'referral_source' => $validated['referral_source'],
            'is_australian_citizen_or_pr' => $validated['is_australian_citizen_or_pr'],
            'visa_type' => $validated['visa_type'] ?? null,
            'has_valid_working_visa' => $validated['has_valid_working_visa'] ?? false,
            'reference_name' => $validated['reference_name'],
            'reference_relationship' => $validated['reference_relationship'],
            'reference_phone' => $validated['reference_phone'],
            'resume_path' => $resumePath,
            'cover_letter' => $validated['cover_letter'],
            'job_position' => $validated['job_position'],
        ]);

        // Send confirmation email to applicant
        Mail::to($application->email)->send(new CareerApplicationReceived($application));

        // Send notification email to admin
        Mail::to(config('mail.from.address'))->send(new NewCareerApplication($application));

        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully'
        ]);
    }
}