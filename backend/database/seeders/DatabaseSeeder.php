<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);

        // Create categories
        $categories = ['Technology', 'Business', 'Lifestyle', 'Travel'];
        
        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat,
                'slug' => \Illuminate\Support\Str::slug($cat)
            ]);
        }

        // Create sample posts
        Post::create([
            'title' => 'Welcome to Our CMS',
            'slug' => 'welcome-to-our-cms',
            'excerpt' => 'This is our first blog post',
            'content' => '<p>Welcome to our new CMS platform! This is a sample post.</p>',
            'user_id' => $user->id,
            'category_id' => 1,
            'is_published' => true,
            'published_at' => now()
        ]);

        Post::create([
            'title' => 'Getting Started with Laravel',
            'slug' => 'getting-started-with-laravel',
            'excerpt' => 'Learn Laravel basics',
            'content' => '<p>Laravel is a powerful PHP framework for web applications.</p>',
            'user_id' => $user->id,
            'category_id' => 1,
            'is_published' => true,
            'published_at' => now()
        ]);
    }
}