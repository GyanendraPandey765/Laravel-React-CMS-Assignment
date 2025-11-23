<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CMS Website')</title>
    <meta name="description" content="@yield('description', 'A modern CMS website')">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">
                        CMS Site
                    </a>
                    <div class="ml-10 flex space-x-4">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md">
                            Home
                        </a>
                        <a href="{{ route('about') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md">
                            About
                        </a>
                        <a href="{{ route('blog.index') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md">
                            Blog
                        </a>
                        <div x-data="{ open: false }" class="relative">
                            <button
                                @mouseenter="open = true"
                                @mouseleave="open = false"
                                @click="open = !open"
                                class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md flex items-center gap-1">
                                Pages
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>

                            <div
                                x-show="open"
                                @mouseenter="open = true"
                                @mouseleave="open = false"
                                class="absolute left-0 mt-2 w-40 bg-white shadow-lg rounded-md py-2 z-50"
                                x-transition>
                                @php
                                $pages = \App\Models\Page::where('is_published', true)->get();
                                @endphp

                                @foreach($pages as $page)
                                <a
                                    href="{{ route('page.show', $page->slug) }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    {{ $page->title }}
                                </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white mt-12 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} CMS Website. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>