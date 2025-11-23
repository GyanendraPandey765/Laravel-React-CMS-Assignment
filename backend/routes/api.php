<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\MediaController;

// Public routes
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // Posts
    Route::apiResource('posts', PostController::class);
    Route::patch('posts/{post}/publish', [PostController::class, 'publish']);
    
    // Pages
    Route::apiResource('pages', PageController::class);
    Route::patch('pages/{page}/publish', [PageController::class, 'publish']);
    
    // Media
    Route::post('media/upload', [MediaController::class, 'upload']);
    Route::get('media', [MediaController::class, 'index']);
    Route::delete('media/{media}', [MediaController::class, 'destroy']);
    
    // Dashboard
    Route::get('dashboard/stats', function () {
        return response()->json([
            'total_posts' => \App\Models\Post::count(),
            'published_posts' => \App\Models\Post::published()->count(),
            'total_pages' => \App\Models\Page::count(),
            'published_pages' => \App\Models\Page::where('is_published', true)->count(),
        ]);
    });
});