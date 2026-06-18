@extends('layouts.dashboard')

@section('title', 'Moderation Logs')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Moderation Logs</h2>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Type</th>
                        <th>Target</th>
                        <th>Action</th>
                        <th>Reason</th>
                        <th>Moderator</th>
                        <th>Date</th>
                        <th>Override</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td>
                                <span class="badge bg-info">{{ class_basename($log->target_type) }}</span>
                            </td>
                            <td>#{{ $log->target_id }}</td>
                            <td>
                                <span class="badge" style="background-color: var(--sunshine-yellow); color: var(--dark-text);">
                                    {{ ucfirst($log->action) }}
                                </span>
                            </td>
                            <td>{{ Str::limit($log->reason, 60) }}</td>
                            <td>{{ $log->moderator?->name ?? 'Unknown' }}</td>
                            <td class="text-muted small">{{ $log->submitted_at?->format('M d, Y H:i') }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.moderation.override', $log->id) }}" class="d-inline"
                                      onsubmit="return confirm('Override this moderation decision?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-warning" title="Override">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">No moderation logs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($logs->hasPages())
        <div class="card-footer bg-white">
            {{ $logs->links() }}
        </div>
    @endif
</div>
@endsection
