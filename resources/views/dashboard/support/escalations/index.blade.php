@extends('layouts.dashboard')

@section('title', 'Escalated Tickets')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Escalated Tickets</h2>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>From</th>
                        <th>Assigned To</th>
                        <th>Priority</th>
                        <th>Escalation Note</th>
                        <th>Created</th>
                        <th style="width: 140px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tickets as $ticket)
                        <tr>
                            <td>#{{ $ticket->id }}</td>
                            <td class="fw-semibold">
                                <a href="{{ route('support.tickets.details', $ticket->id) }}" class="text-decoration-none">{{ $ticket->subject }}</a>
                            </td>
                            <td>{{ $ticket->user?->name ?? 'Unknown' }}</td>
                            <td>{{ $ticket->agent?->name ?? 'Unassigned' }}</td>
                            <td>
                                <span class="badge bg-{{ $ticket->priority->value === 'urgent' ? 'danger' : ($ticket->priority->value === 'high' ? 'warning' : ($ticket->priority->value === 'medium' ? 'info' : 'secondary')) }}">
                                    {{ $ticket->priority->label() }}
                                </span>
                            </td>
                            <td class="text-muted small" style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $ticket->escalation_note }}">
                                {{ $ticket->escalation_note ?? '-' }}
                            </td>
                            <td class="text-muted small">{{ $ticket->created_at->diffForHumans() }}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#flagAdminModal-{{ $ticket->id }}" {{ $ticket->escalation_note ? 'disabled' : '' }}>
                                    <i class="bi bi-flag"></i> Flag Admin
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="flagAdminModal-{{ $ticket->id }}" tabindex="-1" aria-labelledby="flagAdminModalLabel-{{ $ticket->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('support.escalations.flag-admin', $ticket->id) }}">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="flagAdminModalLabel-{{ $ticket->id }}">Flag Ticket #{{ $ticket->id }} to Admin</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="escalation_note-{{ $ticket->id }}" class="form-label">Escalation Note <span class="text-danger">*</span></label>
                                                <textarea name="escalation_note" id="escalation_note-{{ $ticket->id }}" rows="4" class="form-control" required maxlength="1000" placeholder="Explain why this needs admin attention..."></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-flag me-1"></i> Notify Admin
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">No escalated tickets.</td>
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
@endsection
