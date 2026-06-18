@extends('layouts.dashboard')

@section('title', 'Ticket #'.$ticket->id)

@php
    $hoursElapsed = $ticket->created_at->diffInRealHours(now());
@endphp

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="{{ route('support.tickets.index') }}" class="text-decoration-none text-muted small">
            <i class="bi bi-arrow-left"></i> Back to Inbox
        </a>
        <h2 class="fw-bold mt-1">Ticket #{{ $ticket->id }}</h2>
    </div>
    <div class="d-flex gap-2 align-items-center">
        <span class="badge bg-{{ $ticket->status->value === 'new' ? 'info' : ($ticket->status->value === 'in_progress' ? 'primary' : ($ticket->status->value === 'resolved' ? 'success' : ($ticket->status->value === 'closed' ? 'secondary' : ($ticket->status->value === 'escalated' ? 'danger' : 'warning')))) }} fs-6">
            {{ $ticket->status->label() }}
        </span>
        <span class="badge bg-{{ $ticket->priority->value === 'urgent' ? 'danger' : ($ticket->priority->value === 'high' ? 'warning' : ($ticket->priority->value === 'medium' ? 'info' : 'secondary')) }} fs-6">
            {{ $ticket->priority->label() }}
        </span>
        <span class="badge bg-{{ $hoursElapsed > 24 ? 'danger' : 'secondary' }} fs-6">
            <i class="bi bi-clock me-1"></i>{{ floor($hoursElapsed) }}h elapsed
        </span>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom-0 pt-3">
                <h5 class="fw-bold mb-0">{{ $ticket->subject }}</h5>
                <small class="text-muted">
                    Opened by {{ $ticket->user?->name ?? 'Unknown' }}
                    @if($ticket->user)
                        <span class="badge bg-light text-dark ms-1">{{ ucfirst(str_replace('_', ' ', $ticket->user->getRoleNames()[0] ?? 'User')) }}</span>
                    @endif
                    &middot; {{ $ticket->created_at->format('M d, Y g:i A') }}
                </small>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom-0 pt-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Conversation</h5>
            </div>
            <div class="card-body">
                @forelse($ticket->replies as $reply)
                    <div class="d-flex gap-3 mb-4 {{ $reply->is_internal_note ? 'p-3 rounded' : '' }}" style="{{ $reply->is_internal_note ? 'background-color: #f0f0f0;' : '' }}">
                        <div class="flex-shrink-0">
                            <div class="d-flex align-items-center justify-content-center rounded-circle"
                                 style="width: 40px; height: 40px; background-color: {{ $reply->user_id === $ticket->user_id ? 'var(--sky-blue)' : 'var(--mint-green)' }};">
                                <i class="bi bi-person text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div>
                                    <strong>{{ $reply->user?->name ?? 'Unknown' }}</strong>
                                    @if($reply->is_internal_note)
                                        <span class="badge bg-secondary ms-2">Internal Note</span>
                                    @endif
                                </div>
                                <small class="text-muted">{{ $reply->created_at->format('M d, Y g:i A') }}</small>
                            </div>
                            <p class="mb-0" style="white-space: pre-wrap;">{{ $reply->content }}</p>
                        </div>
                    </div>
                    @if(!$loop->last)
                        <hr class="my-0">
                    @endif
                @empty
                    <p class="text-muted text-center py-4 mb-0">No replies yet. Start the conversation below.</p>
                @endforelse
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom-0 pt-3">
                <h5 class="fw-bold mb-0">Add Reply</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('support.tickets.reply', $ticket->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Template</label>
                        <select class="form-select" id="templateSelect">
                            <option value="">Select a template...</option>
                            @foreach($templates as $template)
                                <option value="{{ $template->content }}">{{ $template->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Message <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" rows="6" class="form-control @error('content') is-invalid @enderror" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_internal_note" value="1" class="form-check-input" id="isInternalNote" {{ old('is_internal_note') ? 'checked' : '' }}>
                        <label class="form-check-label" for="isInternalNote">Internal Note (not visible to customer)</label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send me-1"></i> Send Reply
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom-0 pt-3">
                <h5 class="fw-bold mb-0">Details</h5>
            </div>
            <div class="card-body">
                <dl class="mb-0">
                    <dt class="small text-muted">Submitted By</dt>
                    <dd class="mb-3">{{ $ticket->user?->name ?? 'Unknown' }} ({{ $ticket->user?->email ?? 'N/A' }})</dd>

                    <dt class="small text-muted">Assigned To</dt>
                    <dd class="mb-3">{{ $ticket->agent?->name ?? 'Unassigned' }}</dd>

                    <dt class="small text-muted">Created</dt>
                    <dd class="mb-3">{{ $ticket->created_at->format('M d, Y g:i A') }}</dd>

                    <dt class="small text-muted">Last Updated</dt>
                    <dd class="mb-3">{{ $ticket->updated_at->format('M d, Y g:i A') }}</dd>

                    @if($ticket->escalation_note)
                        <dt class="small text-muted">Escalation Note</dt>
                        <dd class="mb-3">{{ $ticket->escalation_note }}</dd>
                    @endif
                </dl>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom-0 pt-3">
                <h5 class="fw-bold mb-0">Assign Agent</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('support.tickets.assign', $ticket->id) }}">
                    @csrf
                    <div class="mb-3">
                        <select name="agent_id" class="form-select">
                            <option value="">Unassigned</option>
                            @foreach(App\Models\User::role('support_agent')->get() as $agent)
                                <option value="{{ $agent->id }}" {{ $ticket->assigned_to == $agent->id ? 'selected' : '' }}>
                                    {{ $agent->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary w-100">
                        <i class="bi bi-person-check me-1"></i> Assign
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('templateSelect')?.addEventListener('change', function() {
        if (this.value) {
            document.getElementById('content').value = this.value;
        }
    });
</script>
@endpush
