<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_published',
        'user_id'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    /**
     * Auto-generate slug on create
     */
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }
        });
    }

    /**
     * Relationship: Page belongs to a User (creator)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
