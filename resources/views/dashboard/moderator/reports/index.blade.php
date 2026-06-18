@extends('layouts.dashboard')

@section('title', 'User Reports')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">User Reports</h2>
    <form method="GET" action="{{ route('moderator.reports.index') }}" class="d-inline">
        <select name="status" class="form-select form-select-sm d-inline-block w-auto" onchange="this.form.submit()">
            <option value="">All Status</option>
            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="resolved" {{ request('status') === 'resolved' ? 'selected' : '' }}>Resolved</option>
            <option value="actioned" {{ request('status') === 'actioned' ? 'selected' : '' }}>Actioned</option>
        </select>
    </form>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Reporter</th>
                        <th>Subject</th>
                        <th>Reason</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $report)
                        <tr>
                            <td>{{ $report->reporter?->name ?? 'Unknown' }}</td>
                            <td>{{ $report->subject?->name ?? 'Unknown' }}</td>
                            <td>{{ Str::limit($report->reason, 40) }}</td>
                            <td>{{ Str::limit($report->detail, 50) }}</td>
                            <td>
                                <span class="badge" style="background-color: {{ $report->status === 'pending' ? 'var(--sunshine-yellow)' : ($report->status === 'actioned' ? 'var(--baby-pink)' : 'var(--mint-green)') }}; color: var(--dark-text);">
                                    {{ ucfirst($report->status) }}
                                </span>
                            </td>
                            <td class="text-muted small">{{ $report->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                @if($report->status === 'pending')
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#warnModal-{{ $report->id }}">
                                        <i class="bi bi-exclamation-circle"></i> Warn
                                    </button>

                                    <form method="POST" action="{{ route('moderator.reports.resolve', $report->id) }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-success">
                                            <i class="bi bi-check-lg"></i> Resolve
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted small">—</span>
                                @endif
                            </td>
                        </tr>

                        @if($report->status === 'pending')
                            <div class="modal fade" id="warnModal-{{ $report->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('moderator.reports.warn', $report->id) }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Send Warning</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-muted">Send a warning to <strong>{{ $report->subject?->name ?? 'Unknown' }}</strong>.</p>
                                                <div class="mb-3">
                                                    <label class="form-label">Message</label>
                                                    <textarea name="message" class="form-control" rows="4" placeholder="Enter warning message..." required>You have received a warning regarding a recent report. Please ensure your content and behavior comply with our guidelines.</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-warning">Send Warning</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">No reports found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($reports->hasPages())
        <div class="card-footer bg-white">
            {{ $reports->links() }}
        </div>
    @endif
</div>
@endsection
