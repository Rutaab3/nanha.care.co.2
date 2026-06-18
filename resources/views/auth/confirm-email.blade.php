@extends('layouts.app')

@section('title', 'Confirm Email')

@section('content')

<div class="min-vh-100 d-flex align-items-center justify-content-center py-5" style="background-color: var(--off-white);">
    <div class="card border-0 shadow-sm p-4" style="max-width: 450px; width: 100%;">
        <div class="card-body text-center">
            <i class="bi bi-envelope-check display-3 mb-3" style="color: var(--sky-blue);"></i>
            <h4 class="fw-bold mb-3" style="color: var(--dark-text);">Confirm Your Email</h4>
            <p class="text-muted mb-4">Thanks for signing up! Please check your email for a confirmation link to verify your account.</p>
            <form method="POST" action="{{ route('auth.confirm-email') }}">
                @csrf
                <button type="submit" class="btn px-4 py-2 fw-bold" style="background-color: var(--sky-blue); color: white;">Resend Confirmation Email</button>
            </form>
            <p class="text-muted small mt-3 mb-0">Didn't receive the email? Check your spam folder or try again.</p>
        </div>
    </div>
</div>

@endsection
