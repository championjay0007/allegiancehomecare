<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\BrochureController;

class ResourceController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('is_published', true)->latest()->paginate(6);
        $services = Service::where('status', 'active')->get();
        return view('resource', compact('services', 'blogs'));
        
    }


    
}