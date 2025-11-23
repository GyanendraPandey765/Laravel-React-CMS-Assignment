@extends('layouts.app')

@section('title', 'Home - CMS Website')

@section('content')
<div class="mb-12">
    <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome to Our Blog</h1>
    <p class="text-xl text-gray-600">Discover amazing content and stories</p>
</div>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($posts as $post)
    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
        @if($post->featured_image)
        <img src="{{ asset('storage/' . $post->featured_image) }}" 
             alt="{{ $post->title }}" 
             class="w-full h-48 object-cover">
        @endif
        
        <div class="p-6">
            @if($post->category)
            <span class="text-xs font-semibold text-blue-600 uppercase">
                {{ $post->category->name }}
            </span>
            @endif
            
            <h2 class="text-xl font-bold mb-2 mt-2">
                <a href="{{ route('blog.show', $post->slug) }}" 
                   class="text-gray-900 hover:text-blue-600">
                    {{ $post->title }}
                </a>
            </h2>
            
            @if($post->excerpt)
            <p class="text-gray-600 mb-4">{{ Str::limit($post->excerpt, 100) }}</p>
            @endif
            
            <div class="flex justify-between items-center text-sm text-gray-500">
                <span>{{ $post->published_at->format('M d, Y') }}</span>
                <span>{{ $post->user->name }}</span>
            </div>
        </div>
    </article>
    @endforeach
</div>

<div class="text-center mt-8">
    <a href="{{ route('blog.index') }}" 
       class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
        View All Posts
    </a>
</div>
@endsection
