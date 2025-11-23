<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category'])
            ->published()
            ->latest('published_at')
            ->paginate(12);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with(['user', 'category'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        return view('blog.show', compact('post'));
    }
}