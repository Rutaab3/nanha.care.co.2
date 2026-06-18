@extends('layouts.dashboard')

@section('title', 'Bookmarks')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0">Bookmarked Articles</h4>
    </div>

    @forelse($bookmarks as $bookmark)
        @php $post = $bookmark->blogPost; @endphp
        @if($post)
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body d-flex align-items-start justify-content-between">
                    <div class="me-3">
                        <h6 class="fw-semibold mb-1">{{ $post->title }}</h6>
                        <small class="text-muted">
                            {{ $post->category?->value ?? 'General' }} ·
                            {{ $post->read_time_minutes }} min read ·
                            {{ $post->published_at?->format('M d, Y') ?? 'Unpublished' }}
                        </small>
                        @if($post->excerpt)
                            <p class="text-muted small mt-1 mb-0">{{ Str::limit($post->excerpt, 120) }}</p>
                        @endif
                    </div>
                    <div class="d-flex gap-2 flex-shrink-0">
                        <a href="{{ route('blog.detail', $post->slug) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-eye"></i> Read
                        </a>
                        <form method="POST" action="{{ route('parent.bookmarks.remove', $post->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this bookmark?')">
                                <i class="bi bi-bookmark-x"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @empty
        <div class="text-center py-5 text-muted">
            <i class="bi bi-bookmark fs-1 d-block mb-2"></i>
            <p>No bookmarked articles yet. Browse the blog and save your favourites!</p>
            <a href="{{ route('blog.index') }}" class="btn btn-primary">Browse Blog</a>
        </div>
    @endforelse
@endsection
