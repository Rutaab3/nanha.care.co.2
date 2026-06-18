@extends('layouts.app')

@section('title', 'Check Email')

@section('content')

<div class="min-vh-100 d-flex align-items-center justify-content-center py-5" style="background-color: var(--off-white);">
    <div class="card border-0 shadow-sm p-4" style="max-width: 450px; width: 100%;">
        <div class="card-body text-center">
            <i class="bi bi-envelope-check display-1 mb-3" style="color: var(--sky-blue);"></i>
            <h4 class="fw-bold mb-3" style="color: var(--dark-text);">Check Your Email</h4>
            <p class="text-muted mb-4">We've sent a verification link to your email address. Please check your inbox and follow the instructions.</p>
            <a href="{{ route('auth.login') }}" class="btn px-4 py-2 fw-bold" style="background-color: var(--sky-blue); color: white;">Back to Login</a>
        </div>
    </div>
</div>

@endsection
