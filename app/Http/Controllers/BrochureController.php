<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\BrochureDownload;
use App\Mail\PricingScheduleDownload;
use App\Models\BrochureRequest;
use App\Rules\Recaptcha; // Imported the reCAPTCHA rule here

class BrochureController extends Controller
{
    public function showForm()
    {
        return view('brochure.form');
    }

    public function pricingForm()
    {
        return view('brochure.pricingform');
    }

    public function ndisForm()
    {
        return view('brochure.ndisform');
    }

    public function download(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'g-recaptcha-response' => ['required', new Recaptcha], // Added validation rule
        ]);

        // Use consistent relative path (no 'public/')
        $brochurePath = 'brochures/allegiance-care-brochure.pdf';
        
        // Check existence using same method as email will use
        if (!Storage::disk('public')->exists($brochurePath)) {
            logger('Brochure missing at: ' . $brochurePath);
            return back()->with('error', 'Brochure unavailable');
        }

        // Store request (exclude reCAPTCHA key from model creation)
        $brochureRequest = BrochureRequest::create(collect($validated)->except('g-recaptcha-response')->toArray());
        $brochureRequest->update(['brochure_path' => $brochurePath]);

        // Send email with brochure
        Mail::to($validated['email'])->send(new BrochureDownload(
            $validated['first_name'],
            $validated['last_name'],
            $brochurePath
        ));

        // Mark email as sent
        $brochureRequest->update(['email_sent' => true]);

        return back()->with('success', 'Brochure has been sent to your email!');
    }
    
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'pricing_type' => 'required|in:ndis,homecare',
            'g-recaptcha-response' => ['required', new Recaptcha], // Added validation rule
        ]);

        // Determine which pricing file to use based on selection
        $pricingType = $request->input('pricing_type');
        $pricingPath = null;
        $pathField = null;

        if ($pricingType === 'ndis') {
            $pricingPath = 'brochures/ndis-pricing.pdf';
            $pathField = 'ndis_pricing_path';
        } else {
            $pricingPath = 'brochures/homecare-pricing.pdf';
            $pathField = 'pricing_schedule_path';
        }

        // Check if pricing file exists
        if (!Storage::disk('public')->exists($pricingPath)) {
            logger('Pricing file missing at: ' . $pricingPath);
            return back()->with('error', 'Pricing schedule unavailable');
        }

        // Clean reCAPTCHA out of data array before saving to database
        $modelData = collect($validated)->except('g-recaptcha-response')->toArray();

        // Store request with pricing type and path
        $pricingRequest = BrochureRequest::create(array_merge($modelData, [
            'pricing_type' => $pricingType,
            $pathField => $pricingPath
        ]));

        // Send email with appropriate pricing schedule
        Mail::to($validated['email'])->send(new PricingScheduleDownload(
            $validated['first_name'],
            $validated['last_name'],
            $pricingPath,
            $pricingType
        ));

        // Mark email as sent
        $pricingRequest->update(['email_sent' => true]);
        
        return back()->with('success', 'Pricing schedule has been sent to your email!');
    }
}