<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier; // Optional: For safe HTML cleaning

class ServiceController extends Controller
{
    // List all services
    public function index()
    {
        $services = Service::all(); // or your actual query
   
        return view('services.index', compact('services'));
    }

    // Show a single service
    public function show($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();
    
        // Decode any HTML entities (in case they were stored encoded)
        $service->custom_html = html_entity_decode(htmlspecialchars_decode($service->custom_html));
    
        $testimonials = Testimonial::where('status', 1)->get();
        $relatedServices = $service->relatedServices();
    
        return view('services.show', [
            'service' => $service,
            'relatedServices' => $relatedServices,
            'testimonials' => $testimonials,
        ]);
    }
    

    public function update(Request $request, $id)
{
    $service = Service::find($id);
    $service->update([
        'custom_html' => clean($request->custom_html) // Use HTML purifier
    ]);
    return back()->with('success', 'Content updated');
}
}
