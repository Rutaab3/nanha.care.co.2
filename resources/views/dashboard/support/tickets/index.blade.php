@extends('layouts.dashboard')

@section('title', 'Ticket Inbox')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Ticket Inbox</h2>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('support.tickets.index') }}" class="row g-2">
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">All Statuses</option>
                    @foreach(App\Enums\TicketStatus::cases() as $status)
                        <option value="{{ $status->value }}" {{ ($filters['status'] ?? '') === $status->value ? 'selected' : '' }}>{{ $status->label() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="priority" class="form-select">
                    <option value="">All Priorities</option>
                    @foreach(App\Enums\TicketPriority::cases() as $priority)
                        <option value="{{ $priority->value }}" {{ ($filters['priority'] ?? '') === $priority->value ? 'selected' : '' }}>{{ $priority->label() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" name="date_from" class="form-control" value="{{ $filters['date_from'] ?? '' }}" placeholder="From">
            </div>
            <div class="col-md-2">
                <input type="date" name="date_to" class="form-control" value="{{ $filters['date_to'] ?? '' }}" placeholder="To">
            </div>
            <div class="col-md-2 d-flex gap-1">
                <button type="submit" class="btn btn-primary flex-fill">
                    <i class="bi bi-funnel"></i> Filter
                </button>
                <a href="{{ route('support.tickets.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
        </form>
    </div>
</div>

<form id="bulkForm" method="POST" action="{{ route('support.tickets.bulk-close') }}">
    @csrf
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom-0 pt-3 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0">Tickets</h5>
            <div class="d-flex gap-2">
                <select id="bulkAgentSelect" name="agent_id" class="form-select form-select-sm" style="width: auto;" form="bulkReassignForm">
                    <option value="">Reassign to...</option>
                    @foreach(App\Models\User::role('support_agent')->get() as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-sm btn-outline-primary" id="bulkReassignBtn" form="bulkReassignForm">Reassign</button>
                <button type="submit" class="btn btn-sm btn-outline-success" id="bulkCloseBtn">Close Selected</button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>From</th>
                            <th>Assigned To</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tickets as $ticket)
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="{{ $ticket->id }}" class="ticket-checkbox"></td>
                                <td>#{{ $ticket->id }}</td>
                                <td class="fw-semibold">
                                    <a href="{{ route('support.tickets.details', $ticket->id) }}" class="text-decoration-none">{{ $ticket->subject }}</a>
                                </td>
                                <td>{{ $ticket->user?->name ?? 'Unknown' }}</td>
                                <td>{{ $ticket->agent?->name ?? 'Unassigned' }}</td>
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
                                <td>
                                    <a href="{{ route('support.tickets.details', $ticket->id) }}" class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">No tickets found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($tickets->hasPages())
            <div class="card-footer bg-white">
                {{ $tickets->links('partials._pagination') }}
            </div>
        @endif
    </div>
</form>

<form id="bulkReassignForm" method="POST" action="{{ route('support.tickets.bulk-reassign') }}">
    @csrf
    <input type="hidden" name="agent_id" id="bulkAgentId">
</form>

@push('scripts')
<script>
    document.getElementById('selectAll')?.addEventListener('change', function() {
        document.querySelectorAll('.ticket-checkbox').forEach(cb => cb.checked = this.checked);
    });

    document.getElementById('bulkReassignBtn')?.addEventListener('click', function(e) {
        e.preventDefault();
        var agentId = document.getElementById('bulkAgentSelect').value;
        if (!agentId) { alert('Please select an agent to reassign to.'); return; }
        var checked = document.querySelectorAll('.ticket-checkbox:checked');
        if (!checked.length) { alert('Please select tickets to reassign.'); return; }
        document.getElementById('bulkAgentId').value = agentId;
        var form = document.getElementById('bulkReassignForm');
        checked.forEach(cb => {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'ids[]';
            input.value = cb.value;
            form.appendChild(input);
        });
        form.submit();
    });

    document.getElementById('bulkCloseBtn')?.addEventListener('click', function(e) {
        var checked = document.querySelectorAll('.ticket-checkbox:checked');
        if (!checked.length) { e.preventDefault(); alert('Please select tickets to close.'); }
    });
</script>
@endpush
@endsection
