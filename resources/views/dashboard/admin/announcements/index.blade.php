@extends('layouts.dashboard')

@section('title', 'Announcements')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Announcements</h2>
    <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> New Announcement
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Target Roles</th>
                        <th>Schedule</th>
                        <th>Sent</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($announcements as $announcement)
                        <tr>
                            <td class="fw-semibold">{{ $announcement->title }}</td>
                            <td>
                                @if(is_array($announcement->target_roles))
                                    @foreach($announcement->target_roles as $role)
                                        <span class="badge me-1" style="background-color: var(--mint-green); color: var(--dark-text);">
                                            {{ ucfirst(str_replace('_', ' ', $role)) }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="text-muted">All</span>
                                @endif
                            </td>
                            <td class="text-muted small">
                                {{ $announcement->publish_at ? $announcement->publish_at->format('M d, Y H:i') : 'Immediate' }}
                            </td>
                            <td>
                                @if($announcement->is_sent)
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                @else
                                    <i class="bi bi-clock text-warning"></i>
                                @endif
                            </td>
                            <td class="text-muted small">{{ $announcement->created_at->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No announcements yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($announcements->hasPages())
        <div class="card-footer bg-white">
            {{ $announcements->links() }}
        </div>
    @endif
</div>
@endsection
