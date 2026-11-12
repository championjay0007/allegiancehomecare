<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 'active')->get();
        return view('aboutpage', compact('services'));
        
    }
}