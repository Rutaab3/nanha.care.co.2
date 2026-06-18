@extends('layouts.app')

@section('title', 'Account Suspended')

@section('content')

<div class="min-vh-100 d-flex align-items-center justify-content-center py-5" style="background-color: var(--off-white);">
    <div class="card border-0 shadow-sm p-4" style="max-width: 500px; width: 100%;">
        <div class="card-body text-center">
            <i class="bi bi-exclamation-triangle-fill display-3 mb-3" style="color: #dc3545;"></i>
            <h4 class="fw-bold mb-3" style="color: var(--dark-text);">Account Suspended</h4>
            <div class="alert alert-danger text-start" role="alert">
                @if(session('ban_reason'))
                    <p class="mb-1"><strong>Reason:</strong> {{ session('ban_reason') }}</p>
                @else
                    <p class="mb-1">Your account has been suspended due to a violation of our terms of service.</p>
                @endif
                <p class="mb-0">
                    <strong>Suspension:</strong>
                    @if(session('banned_until'))
                        Until {{ \Carbon\Carbon::parse(session('banned_until'))->format('F j, Y') }}
                    @else
                        Permanent
                    @endif
                </p>
            </div>
            <p class="text-muted small mb-3">If you believe this is a mistake, please contact our support team.</p>
            <a href="mailto:support@nanhacare.com" class="btn px-4 py-2 fw-bold" style="background-color: var(--sky-blue); color: white;">
                <i class="bi bi-envelope me-2"></i>Contact Support
            </a>
        </div>
    </div>
</div>

@endsection
