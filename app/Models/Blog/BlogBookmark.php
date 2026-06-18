<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class BlogBookmark extends Model
{
    protected $fillable = [
        'parent_id',
        'blog_post_id',
    ];

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class, 'blog_post_id');
    }
}
