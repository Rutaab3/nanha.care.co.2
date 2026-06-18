<?php

namespace App\Http\Controllers\Dashboard\Parent;

use App\Models\Blog\BlogBookmark;

class BookmarksController
{
    public function index()
    {
        $bookmarks = BlogBookmark::with('blogPost')
            ->where('parent_id', auth()->id())
            ->orderByDesc('created_at')
            ->get();

        return view('dashboard.parent.bookmarks.index', compact('bookmarks'));
    }

    public function save($id)
    {
        BlogBookmark::firstOrCreate([
            'parent_id' => auth()->id(),
            'blog_post_id' => $id,
        ]);

        return redirect()->back()->with('success', 'Post bookmarked.');
    }

    public function remove($id)
    {
        BlogBookmark::where('parent_id', auth()->id())
            ->where('blog_post_id', $id)
            ->delete();

        return redirect()->back()->with('success', 'Bookmark removed.');
    }
}
