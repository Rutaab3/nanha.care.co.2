@extends('layouts.dashboard')

@section('title', 'Notifications')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0">Notifications</h4>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                @forelse($notifications as $notification)
                    <li class="list-group-item d-flex align-items-start gap-3 py-3 {{ !$notification->is_read ? 'fw-semibold' : '' }}"
                        style="{{ !$notification->is_read ? 'background-color: rgba(135, 206, 235, 0.08);' : '' }}">
                        <div class="mt-1">
                            @if(!$notification->is_read)
                                <span class="badge rounded-pill" style="background-color: var(--sky-blue); width: 10px; height: 10px; display: inline-block; padding: 0;"></span>
                            @else
                                <span class="badge rounded-pill bg-light" style="width: 10px; height: 10px; display: inline-block; padding: 0;"></span>
                            @endif
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 {{ $notification->is_read ? 'text-muted' : '' }}">{{ $notification->message }}</p>
                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                        @if($notification->link)
                            <a href="{{ $notification->link }}" class="btn btn-sm btn-outline-primary flex-shrink-0">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @endif
                    </li>
                @empty
                    <li class="list-group-item text-center py-5">
                        <i class="bi bi-bell-slash fs-1 text-muted"></i>
                        <p class="text-muted mt-2 mb-0">No notifications</p>
                    </li>
                @endforelse
            </ul>
        </div>
        @if($notifications->hasPages())
            <div class="card-footer bg-white border-0">
                {{ $notifications->links('partials._pagination') }}
            </div>
        @endif
    </div>
@endsection
