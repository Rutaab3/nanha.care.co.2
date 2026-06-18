@extends('layouts.app')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center">
    <div class="text-center">
        <h1 class="display-1 fw-bold" style="color: var(--sky-blue);">401</h1>
        <h3 class="fw-semibold" style="color: var(--dark-text);">Unauthorized</h3>
        <p class="text-muted mb-4">You don't have permission to access this page.</p>
        <a href="{{ route('home') }}" class="btn btn-primary px-4">Go Home</a>
    </div>
</div>
@endsection
