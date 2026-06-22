@extends('layouts.dashboard')

@section('title', 'My Posts')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">My Posts</h2>
    <a href="{{ route('doctor.posts.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> New Post
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom-0 pt-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ !$status ? 'active' : '' }}" href="{{ route('doctor.posts.index') }}">All</a>
            </li>
            @foreach(\App\Enums\ContentStatus::cases() as $s)
                <li class="nav-item">
                    <a class="nav-link {{ $status === $s->value ? 'active' : '' }}"
                       href="{{ route('doctor.posts.index', ['status' => $s->value]) }}">
                        {{ $s->label() }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Comments</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>
                                <span class="fw-semibold">{{ $post->title }}</span>
                            </td>
                            <td><span class="badge bg-light text-dark">{{ $post->category->label() }}</span></td>
                            <td>
                                @php
                                    $badgeMap = ['draft' => 'secondary', 'under_review' => 'info', 'published' => 'success', 'rejected' => 'danger', 'archived' => 'warning'];
                                @endphp
                                <span class="badge bg-{{ $badgeMap[$post->status->value] ?? 'secondary' }}">
                                    {{ $post->status->label() }}
                                </span>
                            </td>
                            <td>{{ number_format($post->views) }}</td>
                            <td>{{ $post->comments_count ?? $post->comments->count() }}</td>
                            <td class="text-muted small">{{ $post->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('doctor.posts.edit', $post->id) }}"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                                        @if($post->status === \App\Enums\ContentStatus::Draft)
                                            <li>
                                                <form method="POST" action="{{ route('doctor.posts.destroy', $post->id) }}"
                                                      onsubmit="return confirm('Delete this draft?')">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="bi bi-trash me-2"></i>Delete
                                                    </button>
                                                </form>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                No posts found.
                                <a href="{{ route('doctor.posts.create') }}">Create your first post</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($posts->hasPages())
        <div class="card-footer bg-white">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
