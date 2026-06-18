@extends('layouts.dashboard')

@section('title', 'My Activity Log')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">My Activity Log</h2>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Action</th>
                        <th>Target</th>
                        <th>Reason / Note</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td>
                                <span class="badge" style="background-color:
                                    {{ $log->action === 'approved' ? 'var(--mint-green)' : ($log->action === 'rejected' ? 'var(--baby-pink)' : 'var(--sunshine-yellow)') }}; color: var(--dark-text);">
                                    {{ ucfirst($log->action) }}
                                </span>
                            </td>
                            <td>{{ class_basename($log->target_type) }} #{{ $log->target_id }}</td>
                            <td>{{ Str::limit($log->reason, 60) }}</td>
                            <td class="text-muted small">{{ $log->submitted_at?->format('M d, Y H:i') ?? $log->created_at->format('M d, Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">No activity recorded yet.</td>
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
