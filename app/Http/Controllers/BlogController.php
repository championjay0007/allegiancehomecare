<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('is_published', true)
                    ->orderBy('created_at', 'desc')
                    ->paginate(9);
                    
        return view('blog.index', compact('blogs'));
    }
    
    public function show($slug)
    {
        $post = Blog::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }
    
    // Admin - Store Blog
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
        ]);
    
        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog', 'public');
        }
    
        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => Str::limit(strip_tags($request->content), 150),
            'content' => $request->content,
            'featured_image' => $imagePath,
            'is_published' => $request->has('is_published'),
        ]);
    
        return redirect()->back()->with('success', 'Blog post created!');
    }
}
