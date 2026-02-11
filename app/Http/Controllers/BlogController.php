<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(6);
        return view('blog', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with('category')->where('slug', $slug)->firstOrFail();
        $recent_posts = Post::latest()->take(5)->get();
        return view('single-blog', compact('post', 'recent_posts'));
    }
}
