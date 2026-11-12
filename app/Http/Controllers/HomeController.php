<?php
namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Blog;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        // Fetch services
        $services = Service::where('status', 'active')->get(); // Adjust based on schema
       
    
        // Fetch testimonials
        $testimonials = Testimonial::where('status', 1)->get();
    
        // Fetch blog posts
        $posts = Blog::where('is_published', true)->latest()->paginate(6);
    
        return view('home', compact('services', 'testimonials', 'posts'));
    }
}
