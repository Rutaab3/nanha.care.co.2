<?php

namespace App\Models\Blog;

use App\Enums\BlogCategory;
use App\Enums\ContentStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'doctor_id',
        'title',
        'slug',
        'content',
        'excerpt',
        'cover_image',
        'category',
        'tags',
        'read_time_minutes',
        'views',
        'status',
        'published_at',
    ];

    protected $casts = [
        'category' => BlogCategory::class,
        'status' => ContentStatus::class,
        'tags' => 'array',
        'published_at' => 'datetime',
        'views' => 'integer',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_post_id');
    }
}
