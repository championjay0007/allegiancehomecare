<?php

namespace App\Http\Controllers;

use App\Mail\CareerApplicationReceived;
use App\Mail\NewCareerApplication;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class CareerController extends Controller
{
    public function index()
    {
        return view('careers.index', [
            'roles' => Career::ROLES,
            'locations' => Career::LOCATIONS,
            'employmentTypes' => Career::EMPLOYMENT_TYPES,
            'workRightsOptions' => Career::WORK_RIGHTS_OPTIONS,
            'availabilities' => Career::AVAILABILITIES,
            'referralSources' => Career::REFERRAL_SOURCES,
        ]);
    }

    public function thankYou()
    {
        return view('careers.thank-you');
    }

    public function submitApplication(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'referral_source' => ['required', 'string', Rule::in(Career::REFERRAL_SOURCES)],
            'preferred_location' => ['required', 'string', Rule::in(Career::LOCATIONS)],
            'employment_type_preference' => ['required', 'string', Rule::in(Career::EMPLOYMENT_TYPES)],
            'work_rights' => ['required', 'string', Rule::in(Career::WORK_RIGHTS_OPTIONS)],
            'availability' => ['required', 'string', Rule::in(Career::AVAILABILITIES)],
            'consent' => 'required|accepted',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|string|max:5000',
            'job_position' => ['required', 'string', Rule::in(Career::ROLES)],
        ]);

        // Store resume
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Create application
        $application = Career::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'job_position' => $validated['job_position'],
            'preferred_location' => $validated['preferred_location'],
            'employment_type_preference' => $validated['employment_type_preference'],
            'work_rights' => $validated['work_rights'],
            'availability' => $validated['availability'],
            'referral_source' => $validated['referral_source'],
            'consent' => true,
            'resume_path' => $resumePath,
            'cover_letter' => $validated['cover_letter'] ?? null,
        ]);

        // Send confirmation email to applicant
        Mail::to($application->email)->send(new CareerApplicationReceived($application));

        // Send notification email to admin
        Mail::to(config('mail.from.address'))->send(new NewCareerApplication($application));

        if (! $request->expectsJson()) {
            return redirect()->route('careers.thank-you');
        }

        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully',
            'redirect' => route('careers.thank-you'),
        ]);
    }
}
