<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::where('is_available', true)->get();
        $posts = Post::with('category')->latest()->take(3)->get();
        return view('home', compact('rooms', 'posts'));
    }
}
