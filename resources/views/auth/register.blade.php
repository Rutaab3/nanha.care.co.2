@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="min-vh-100 d-flex align-items-center justify-content-center py-5" style="background-color: var(--off-white);">
    <div class="card border-0 shadow-sm p-4" style="max-width: 500px; width: 100%;">
        <div class="card-body">
            <div class="text-center mb-4">
                <i class="bi bi-heart-pulse-fill display-4" style="color: var(--baby-pink);"></i>
                <h4 class="fw-bold mt-2" style="color: var(--sky-blue);">Create Account</h4>
            </div>
            <form method="POST" action="{{ route('auth.register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Full Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>
                <div class="mb-4">
                    <label for="role" class="form-label fw-semibold">I want to join as</label>
                    <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required>
                        <option value="" disabled selected>Select your role</option>
                        <option value="parent" {{ old('role') == 'parent' ? 'selected' : '' }}>Parent</option>
                        <option value="babysitter" {{ old('role') == 'babysitter' ? 'selected' : '' }}>Babysitter</option>
                        <option value="shop_owner" {{ old('role') == 'shop_owner' ? 'selected' : '' }}>Shop Owner</option>
                        <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn w-100 py-2 fw-bold" style="background-color: var(--sky-blue); color: white;">Register</button>
            </form>
            <p class="text-center mt-3 mb-0 small">
                Already have an account? <a href="{{ route('auth.login') }}" class="text-decoration-none fw-semibold" style="color: var(--sky-blue);">Login</a>
            </p>
        </div>
    </div>
</div>

@endsection
