@extends('layouts.dashboard')

@section('title', 'Doctor Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Doctor Dashboard</h2>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        @include('components.stats-card', ['icon' => 'file-text', 'value' => $total_posts, 'label' => 'Total Posts', 'color' => 'var(--sky-blue)'])
    </div>
    <div class="col-md-4">
        @include('components.stats-card', ['icon' => 'check-circle', 'value' => $published_posts, 'label' => 'Published', 'color' => 'var(--mint-green)'])
    </div>
    <div class="col-md-4">
        @include('components.stats-card', ['icon' => 'eye', 'value' => number_format($total_views), 'label' => 'Total Views', 'color' => 'var(--sunshine-yellow)'])
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom-0 pt-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Recent Posts</h5>
                <a href="{{ route('doctor.posts.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_posts as $post)
                                <tr>
                                    <td>
                                        <a href="{{ route('doctor.posts.edit', $post->id) }}" class="text-decoration-none fw-semibold">
                                            {{ $post->title }}
                                        </a>
                                    </td>
                                    <td>
                                        @php
                                            $badgeMap = ['draft' => 'secondary', 'under_review' => 'info', 'published' => 'success', 'rejected' => 'danger', 'archived' => 'warning'];
                                        @endphp
                                        <span class="badge bg-{{ $badgeMap[$post->status->value] ?? 'secondary' }}">
                                            {{ $post->status->label() }}
                                        </span>
                                    </td>
                                    <td>{{ number_format($post->views) }}</td>
                                    <td class="text-muted small">{{ $post->created_at->format('M d, Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">No posts yet. <a href="{{ route('doctor.posts.create') }}">Write your first post</a></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom-0 pt-3">
                <h5 class="fw-bold mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('doctor.posts.create') }}" class="btn btn-primary w-100 mb-2">
                    <i class="bi bi-pencil-square"></i> Write New Post
                </a>
                <a href="{{ route('doctor.comments.index') }}" class="btn btn-outline-secondary w-100 mb-2">
                    <i class="bi bi-chat-dots"></i> View Comments
                </a>
                <a href="{{ route('doctor.analytics.index') }}" class="btn btn-outline-secondary w-100">
                    <i class="bi bi-graph-up"></i> View Analytics
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
