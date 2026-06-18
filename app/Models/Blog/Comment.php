<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'blog_post_id',
        'user_id',
        'content',
        'reply',
        'is_flagged',
    ];

    protected $casts = [
        'is_flagged' => 'boolean',
    ];

    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class, 'blog_post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
