<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'filename',
        'original_name',
        'mime_type',
        'size',
        'path',
        'user_id'
    ];

    /**
     * Relationship: Media belongs to a User (uploader)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
