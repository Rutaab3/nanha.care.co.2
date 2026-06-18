@extends('layouts.app')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center">
    <div class="text-center">
        <h1 class="display-1 fw-bold" style="color: var(--sky-blue);">500</h1>
        <h3 class="fw-semibold" style="color: var(--dark-text);">Server Error</h3>
        <p class="text-muted mb-4">Something went wrong on our end. Please try again later.</p>
        <a href="{{ route('home') }}" class="btn btn-primary px-4">Go Home</a>
    </div>
</div>
@endsection
