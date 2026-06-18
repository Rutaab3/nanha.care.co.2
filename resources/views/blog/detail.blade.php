@extends('layouts.app')

@section('content')
<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--sky-blue);">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}" style="color: var(--sky-blue);">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
        </ol>
    </nav>

    <article>
        <div class="mb-3">
            <span class="badge rounded-pill px-3 py-1" style="background-color: var(--mint-green); color: var(--dark-text);">{{ $post->category }}</span>
        </div>
        <h1 class="fw-bold mb-3" style="color: var(--dark-text);">{{ $post->title }}</h1>
        <div class="d-flex align-items-center gap-3 mb-4">
            <img src="{{ $post->doctor?->doctorProfile?->profile_photo ? asset('storage/' . $post->doctor->doctorProfile->profile_photo) : 'https://placehold.co/50x50?text=Dr' }}" alt="{{ $post->doctor->name ?? 'Author' }}" class="rounded-circle" style="width: 45px; height: 45px; object-fit: cover;">
            <div>
                <h6 class="mb-0 fw-semibold">{{ $post->doctor->name ?? 'Dr. Expert' }}</h6>
                <small class="text-muted">{{ $post->published_at?->format('F d, Y') ?? 'Recently' }} &middot; {{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</small>
            </div>
        </div>

        <img src="{{ $post->cover_image ? asset('storage/' . $post->cover_image) : 'https://placehold.co/1200x600?text=Blog' }}" alt="{{ $post->title }}" class="img-fluid rounded mb-4 w-100" style="max-height: 500px; object-fit: cover;">

        <div class="mb-5 fs-5 lh-lg" style="color: var(--dark-text);">
            {!! $post->content !!}
        </div>

        @if($post->doctor)
        <div class="card shadow-sm border-0 mb-5" style="background-color: var(--off-white);">
            <div class="card-body d-flex align-items-center gap-4">
                <img src="{{ $post->doctor?->doctorProfile?->profile_photo ? asset('storage/' . $post->doctor->doctorProfile->profile_photo) : 'https://placehold.co/80x80?text=Dr' }}" alt="{{ $post->doctor->name }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                <div>
                    <h5 class="fw-bold mb-1" style="color: var(--dark-text);">{{ $post->doctor->name }}</h5>
                    <p class="mb-1 text-muted">{{ $post->doctor?->doctorProfile?->specialization ?? 'Pediatrician' }}</p>
                    <small class="text-muted">PMDC No: {{ $post->doctor?->doctorProfile?->pmdc_number ?? 'N/A' }}</small>
                    <br>
                    <a href="#" class="btn btn-sm mt-2" style="background-color: var(--sky-blue); color: var(--white);">View Profile</a>
                </div>
            </div>
        </div>
        @endif

        <div class="mb-5">
            <h6 class="fw-semibold mb-2">Share this article:</h6>
            <div class="d-flex gap-2">
                <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle"><i class="bi bi-facebook"></i></a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="btn btn-outline-dark btn-sm rounded-circle"><i class="bi bi-twitter-x"></i></a>
                <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="btn btn-outline-success btn-sm rounded-circle"><i class="bi bi-whatsapp"></i></a>
                <button type="button" class="btn btn-outline-secondary btn-sm rounded-circle" onclick="navigator.clipboard.writeText(window.location.href); this.innerHTML='<i class=bi bi-check></i>';"><i class="bi bi-link-45deg"></i></button>
            </div>
        </div>
    </article>

    @if($relatedPosts->count() > 0)
    <div class="mb-5">
        <h4 class="fw-bold mb-4" style="color: var(--dark-text);">Related Articles</h4>
        <div class="row g-4">
            @foreach($relatedPosts as $related)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ $related->cover_image ? asset('storage/' . $related->cover_image) : 'https://placehold.co/600x400?text=Blog' }}" alt="{{ $related->title }}" class="card-img-top rounded-top" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <span class="badge rounded-pill px-2 py-1 mb-2" style="background-color: var(--mint-green); color: var(--dark-text); font-size: 0.75rem;">{{ $related->category }}</span>
                        <h6 class="fw-bold" style="color: var(--dark-text);">{{ $related->title }}</h6>
                        <a href="{{ route('blog.detail', $related->slug) }}" class="btn btn-sm mt-2" style="background-color: var(--sky-blue); color: var(--white);">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="mb-5">
        <h4 class="fw-bold mb-4" style="color: var(--dark-text);">Comments ({{ $post->comments->count() }})</h4>

        @if($post->comments->count() > 0)
        <div class="d-flex flex-column gap-3 mb-4">
            @foreach($post->comments as $comment)
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex gap-3">
                        <img src="https://placehold.co/40x40?text=U" alt="{{ $comment->user->name ?? 'User' }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                        <div>
                            <h6 class="mb-0 fw-semibold">{{ $comment->user->name ?? 'Anonymous' }}</h6>
                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                            <p class="mt-2 mb-0">{{ $comment->content }}</p>
                            @if($comment->reply)
                            <div class="mt-3 p-3 rounded" style="background-color: var(--mint-green); border-left: 4px solid var(--sky-blue);">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <i class="bi bi-chat-quote"></i>
                                    <strong class="small">Doctor's Reply</strong>
                                </div>
                                <p class="mb-0">{{ $comment->reply }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @if(auth()->check())
            @if(auth()->user()->hasRole('parent'))
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="fw-bold mb-3" style="color: var(--dark-text);">Leave a Comment</h6>
                    <form method="POST" action="{{ route('blog.comment', $post->id) }}">
                        @csrf
                        <div class="mb-3">
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="4" placeholder="Share your thoughts..." required></textarea>
                            @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn" style="background-color: var(--sky-blue); color: var(--white);">Post Comment</button>
                    </form>
                </div>
            </div>
            @else
            <div class="alert alert-info d-flex align-items-center gap-2">
                <i class="bi bi-info-circle"></i> Only parents can leave comments.
            </div>
            @endif
        @else
        <div class="alert alert-light d-flex align-items-center gap-2 border">
            <i class="bi bi-person"></i> Please <a href="{{ route('auth.login') }}" class="fw-semibold" style="color: var(--sky-blue);">login</a> to leave a comment.
        </div>
        @endif

        @if($post->comments->count() === 0)
        <div class="text-center py-4">
            <i class="bi bi-chat-dots" style="font-size: 2.5rem; color: var(--sky-blue);"></i>
            <p class="text-muted mt-2 mb-0">No comments yet. Be the first to share your thoughts!</p>
        </div>
        @endif
    </div>
</div>
@endsection
