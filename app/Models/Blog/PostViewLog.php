<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class PostViewLog extends Model
{
    protected $fillable = [
        'blog_post_id',
        'user_id',
        'city',
        'ip_address',
        'viewed_at',
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
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
