<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::with('user')->latest()->paginate(15);
        return response()->json($pages);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:pages,slug',
            'content' => 'required|string',
            'is_published' => 'boolean'
        ]);

        $validated['user_id'] = auth()->id();

        $page = Page::create($validated);

        return response()->json($page->load('user'), 201);
    }

    public function show(Page $page)
    {
        return response()->json($page->load('user'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:pages,slug,' . $page->id,
            'content' => 'required|string',
            'is_published' => 'boolean'
        ]);

        $page->update($validated);

        return response()->json($page->load('user'));
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return response()->json(['message' => 'Page deleted successfully']);
    }

    public function publish(Page $page)
    {
        $page->update(['is_published' => !$page->is_published]);
        return response()->json($page);
    }
}