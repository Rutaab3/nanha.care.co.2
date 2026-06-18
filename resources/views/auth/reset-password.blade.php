@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')

<div class="min-vh-100 d-flex align-items-center justify-content-center py-5" style="background-color: var(--off-white);">
    <div class="card border-0 shadow-sm p-4" style="max-width: 450px; width: 100%;">
        <div class="card-body">
            <div class="text-center mb-4">
                <h4 class="fw-bold" style="color: var(--dark-text);">Reset Password</h4>
            </div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token ?? '' }}">
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">New Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn w-100 py-2 fw-bold" style="background-color: var(--sky-blue); color: white;">Reset Password</button>
            </form>
        </div>
    </div>
</div>

@endsection
