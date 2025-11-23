@extends('layouts.app')

@section('title', $post->title . ' - CMS Website')
@section('description', $post->excerpt)

@section('content')
<article class="max-w-4xl mx-auto">
    @if($post->featured_image)
    <img src="{{ asset('storage/' . $post->featured_image) }}" 
         alt="{{ $post->title }}" 
         class="w-full h-96 object-cover rounded-lg mb-8">
    @endif

    <div class="mb-6">
        @if($post->category)
        <span class="text-sm font-semibold text-blue-600 uppercase">
            {{ $post->category->name }}
        </span>
        @endif
    </div>

    <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>

    <div class="flex items-center text-gray-600 mb-8">
        <span class="mr-4">By {{ $post->user->name }}</span>
        <span>{{ $post->published_at->format('F d, Y') }}</span>
    </div>

    <div class="prose prose-lg max-w-none">
        {!! $post->content !!}
    </div>

    <div class="mt-12 pt-8 border-t">
        <a href="{{ route('blog.index') }}" 
           class="text-blue-600 hover:text-blue-800">
            ← Back to Blog
        </a>
    </div>
</article>
@endsection