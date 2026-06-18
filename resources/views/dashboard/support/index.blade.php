@extends('layouts.dashboard')

@section('title', 'Support Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Support Dashboard</h2>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-6 col-lg-3">
        @include('components.stats-card', ['icon' => 'ticket-perforated', 'value' => $assigned_tickets, 'label' => 'Assigned Tickets', 'color' => 'var(--sky-blue)'])
    </div>
    <div class="col-md-6 col-lg-3">
        @include('components.stats-card', ['icon' => 'check-circle', 'value' => $resolved_today, 'label' => 'Resolved Today', 'color' => 'var(--mint-green)'])
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom-0 pt-3 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0">Recent Tickets</h5>
        <a href="{{ route('support.tickets.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>From</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recent_tickets as $ticket)
                        <tr role="button" onclick="window.location='{{ route('support.tickets.details', $ticket->id) }}'" style="cursor: pointer;">
                            <td>#{{ $ticket->id }}</td>
                            <td class="fw-semibold">{{ $ticket->subject }}</td>
                            <td>{{ $ticket->user?->name ?? 'Unknown' }}</td>
                            <td>
                                <span class="badge bg-{{ $ticket->status->value === 'new' ? 'info' : ($ticket->status->value === 'in_progress' ? 'primary' : ($ticket->status->value === 'resolved' ? 'success' : ($ticket->status->value === 'closed' ? 'secondary' : ($ticket->status->value === 'escalated' ? 'danger' : 'warning')))) }}">
                                    {{ $ticket->status->label() }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $ticket->priority->value === 'urgent' ? 'danger' : ($ticket->priority->value === 'high' ? 'warning' : ($ticket->priority->value === 'medium' ? 'info' : 'secondary')) }}">
                                    {{ $ticket->priority->label() }}
                                </span>
                            </td>
                            <td class="text-muted small">{{ $ticket->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No tickets assigned to you yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
