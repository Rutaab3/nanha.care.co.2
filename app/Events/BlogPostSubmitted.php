<?php

namespace App\Events;

use App\Models\Blog\BlogPost;
use Illuminate\Foundation\Events\Dispatchable;

class BlogPostSubmitted
{
    use Dispatchable;

    public BlogPost $post;

    public function __construct(BlogPost $post)
    {
        $this->post = $post;
    }
}
