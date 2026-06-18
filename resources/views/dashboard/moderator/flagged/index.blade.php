@extends('layouts.dashboard')

@section('title', 'Flagged Items')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Flagged Items</h2>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Content</th>
                        <th>Reason</th>
                        <th>Reporter</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ class_basename($item->flaggable_type) }} #{{ $item->flaggable_id }}</td>
                            <td>{{ Str::limit($item->reason, 50) }}</td>
                            <td>{{ $item->reporter?->name ?? 'Unknown' }}</td>
                            <td class="text-muted small">{{ $item->created_at->diffForHumans() }}</td>
                            <td class="text-end">
                                <form method="POST" action="{{ route('moderator.flagged.dismiss', $item->id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-success" title="Dismiss flag">
                                        <i class="bi bi-check-lg"></i> Dismiss
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('moderator.flagged.unpublish', $item->id) }}" class="d-inline"
                                      onsubmit="return confirm('Unpublish this flagged content?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-warning" title="Unpublish content">
                                        <i class="bi bi-archive"></i> Unpublish
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('moderator.flagged.escalate', $item->id) }}" class="d-inline"
                                      onsubmit="return confirm('Escalate this flag to admin?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Escalate to admin">
                                        <i class="bi bi-exclamation-triangle"></i> Escalate
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('moderator.flagged.warn', $item->id) }}" class="d-inline"
                                      onsubmit="return confirm('Send a warning to the content owner?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-secondary" title="Send warning">
                                        <i class="bi bi-exclamation-circle"></i> Warn
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No flagged items.</td>
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
