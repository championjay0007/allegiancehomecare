<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackComplaintReceived;
use App\Mail\FeedbackComplaintSubmitted;
use App\Models\FeedbackComplaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class FeedbackComplaintController extends Controller
{
    public function store(Request $request)
    {
        $isAnonymous = $request->boolean('anonymous');
        $validated = $request->validate([
            'name' => $isAnonymous ? ['exclude'] : ['required', 'string', 'max:255'],
            'email' => $isAnonymous ? ['exclude'] : ['required', 'email', 'max:255'],
            'message' => 'required|string|max:5000',
            'category' => ['required', Rule::in(['NDIS', 'Home Care', 'Other'])],
            'agree_terms' => 'required|accepted',
        ]);

        $feedback = FeedbackComplaint::create([
            'name' => $validated['name'] ?? null,
            'email' => $validated['email'] ?? null,
            'message' => $validated['message'],
            'category' => $validated['category'],
            'anonymous' => $isAnonymous,
        ]);

        $adminAddress = config('mail.admin_address') ?: config('mail.from.address');
        Mail::to($adminAddress)->send(new FeedbackComplaintSubmitted($feedback));

        if (! $isAnonymous) {
            Mail::to($feedback->email)->send(new FeedbackComplaintReceived);
        }

        return back()->with('success', 'Thank you for your feedback.');
    }

    // Optional: Admin listing
    public function index()
    {
        $feedbacks = FeedbackComplaint::latest()->paginate(10);

        return view('admin.feedback.index', compact('feedbacks'));
    }
}
