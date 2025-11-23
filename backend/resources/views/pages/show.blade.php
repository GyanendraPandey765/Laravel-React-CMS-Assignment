@extends('layouts.app')

@section('title', $page->title . ' - CMS Blog')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Breadcrumb -->
    <nav class="mb-8 text-sm text-gray-600">
        <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
        <span class="mx-2">/</span>
        <span class="text-gray-900">{{ $page->title }}</span>
    </nav>

    <!-- Page Title -->
    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">
        {{ $page->title }}
    </h1>

    <!-- Page Content -->
    <div class="prose prose-lg max-w-none">
        {!! $page->content !!}
    </div>
</div>
@endsection