<?php


namespace App\Http\Controllers;
use App\Mail\FeedbackComplaintSubmitted;
use Illuminate\Support\Facades\Mail;
use App\Models\FeedbackComplaint;
use Illuminate\Http\Request;

class FeedbackComplaintController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'message' => 'required|string|max:5000',
        'category' => 'required|in:NDIS,Home Care',
        'agree_terms' => 'required|accepted',
    ]);

    $feedback = FeedbackComplaint::create([
        'name' => $request->filled('anonymous') ? null : $request->input('name'),
        'email' => $request->filled('anonymous') ? null : $request->input('email'),
        'message' => $request->input('message'),
        'category' => $request->input('category'),
        'anonymous' => $request->has('anonymous'),
    ]);

   
    Mail::to(env('MAIL_FROM_ADDRESS'))
    ->send(new FeedbackComplaintSubmitted($feedback));

    return back()->with('success', 'Thank you for your feedback.');
}

    // Optional: Admin listing
    public function index()
    {
        $feedbacks = FeedbackComplaint::latest()->paginate(10);
        return view('admin.feedback.index', compact('feedbacks'));
    }
}