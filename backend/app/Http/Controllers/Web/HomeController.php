<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category'])
            ->published()
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('home', compact('posts'));
    }
}