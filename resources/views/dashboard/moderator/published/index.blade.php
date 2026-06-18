@extends('layouts.dashboard')

@section('title', 'Published Content')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Published Content</h2>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        @php
                            $type = class_basename($item);
                            if ($type === 'Product') {
                                $title = $item->name;
                                $author = $item->shop?->user?->name ?? 'Unknown';
                            } else {
                                $title = $item->title;
                                $author = $item->doctor?->user?->name ?? 'Unknown';
                            }
                        @endphp
                        <tr>
                            <td>
                                <span class="badge bg-info">{{ $type }}</span>
                            </td>
                            <td>{{ Str::limit($title, 60) }}</td>
                            <td>{{ $author }}</td>
                            <td class="text-muted small">{{ $item->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <form method="POST" action="{{ route('moderator.published.unpublish', [Str::snake($type), $item->id]) }}" class="d-inline"
                                      onsubmit="return confirm('Unpublish this item? It will be archived.');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-archive"></i> Unpublish
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No published content found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($items->hasPages())
        <div class="card-footer bg-white">
            {{ $items->links() }}
        </div>
    @endif
</div>
@endsection
