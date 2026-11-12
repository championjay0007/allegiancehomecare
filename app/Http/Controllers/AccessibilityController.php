<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class AccessibilityController extends Controller
{
    public function index()
    {
       
        return view('accessibility');
        
    }
}