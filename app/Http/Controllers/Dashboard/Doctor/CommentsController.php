<?php

namespace App\Http\Controllers\Dashboard\Doctor;

use App\Models\Blog\Comment;
use App\Models\System\FlaggedItem;
use Illuminate\Http\Request;

class CommentsController
{
    public function index()
    {
        $comments = Comment::whereHas('blogPost', function ($q) {
            $q->where('doctor_id', auth()->id());
        })->with('blogPost', 'user')->orderByDesc('created_at')->paginate(15);

        return view('dashboard.doctor.comments.index', compact('comments'));
    }

    public function reply(Request $request, $id)
    {
        $validated = $request->validate([
            'reply' => 'required|string',
        ]);

        $comment = Comment::with('blogPost')->findOrFail($id);

        if ($comment->blogPost->doctor_id !== auth()->id()) {
            abort(403);
        }

        $comment->update(['reply' => $validated['reply']]);

        return redirect()->route('doctor.comments.index')->with('success', 'Reply posted successfully.');
    }

    public function flag($id)
    {
        $comment = Comment::with('blogPost')->findOrFail($id);

        if ($comment->blogPost->doctor_id !== auth()->id()) {
            abort(403);
        }

        FlaggedItem::create([
            'reporter_id' => auth()->id(),
            'flaggable_id' => $comment->id,
            'flaggable_type' => Comment::class,
            'reason' => 'Flagged by doctor',
            'status' => 'pending',
        ]);

        return redirect()->route('doctor.comments.index')->with('success', 'Comment flagged for moderation.');
    }
}
