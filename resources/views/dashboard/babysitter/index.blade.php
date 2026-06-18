@extends('layouts.dashboard')

@section('title', 'Babysitter Dashboard')

@php
    $profile = auth()->user()->babysitterProfile;
    $verifiedStatus = $profile?->verified_status ?? null;
    $upcomingBooking = \App\Models\Babysitting\Booking::where('babysitter_id', auth()->id())
        ->whereIn('status', [\App\Enums\BookingStatus::Confirmed])
        ->where('date', '>=', now()->toDateString())
        ->orderBy('date')
        ->orderBy('start_time')
        ->first();
@endphp

@section('content')
    @if($verifiedStatus)
        @php
            $bannerClass = match((string) $verifiedStatus->value) {
                'verified' => 'bg-success',
                'pending' => 'bg-warning text-dark',
                'rejected' => 'bg-danger',
                default => 'bg-secondary'
            };
            $bannerText = match((string) $verifiedStatus->value) {
                'verified' => 'Your profile is verified. You can now receive bookings.',
                'pending' => 'Your profile is pending verification. Please wait for admin review.',
                'rejected' => 'Your profile verification was rejected.' . ($profile?->rejection_reason ? ' Reason: ' . $profile->rejection_reason : ''),
                default => ''
            };
        @endphp
        <div class="alert {{ $bannerClass }} text-white d-flex align-items-center gap-2 py-3" role="alert">
            <i class="bi bi-{{ (string) $verifiedStatus->value === 'verified' ? 'check-circle-fill' : ((string) $verifiedStatus->value === 'pending' ? 'hourglass-split' : 'x-circle-fill') }} fs-5"></i>
            <span>{{ $bannerText }}</span>
        </div>
    @endif

    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0">Overview</h4>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            @include('components.stats-card', ['icon' => 'calendar-check', 'value' => $total_bookings, 'label' => 'Total Bookings', 'color' => 'var(--sky-blue)'])
        </div>
        <div class="col-md-3">
            @include('components.stats-card', ['icon' => 'check-circle', 'value' => $completed_bookings, 'label' => 'Completed', 'color' => 'var(--mint-green)'])
        </div>
        <div class="col-md-3">
            @include('components.stats-card', ['icon' => 'hourglass', 'value' => $pending_bookings, 'label' => 'Pending', 'color' => 'var(--sunshine-yellow)'])
        </div>
        <div class="col-md-3">
            @include('components.stats-card', ['icon' => 'star', 'value' => number_format($average_rating ?? 0, 1), 'label' => 'Avg Rating', 'color' => 'var(--baby-pink)'])
        </div>
        <div class="col-md-3">
            @include('components.stats-card', ['icon' => 'currency-dollar', 'value' => '$' . number_format($total_earned ?? 0, 2), 'label' => 'Total Earned', 'color' => 'var(--mint-green)'])
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between py-3">
                    <h5 class="mb-0">Upcoming Booking</h5>
                </div>
                <div class="card-body">
                    @if($upcomingBooking)
                        <p class="mb-1"><strong>Date:</strong> {{ $upcomingBooking->date->format('M d, Y') }}</p>
                        <p class="mb-1"><strong>Time:</strong> {{ \Carbon\Carbon::parse($upcomingBooking->start_time)->format('h:i A') }}</p>
                        <p class="mb-1"><strong>Duration:</strong> {{ $upcomingBooking->duration_hours }} hour(s)</p>
                        <p class="mb-0"><strong>Parent:</strong> {{ $upcomingBooking->parent->name ?? 'N/A' }}</p>
                    @else
                        <p class="text-muted mb-0">No upcoming bookings</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0">Quick Links</h5>
                </div>
                <div class="card-body d-flex flex-column gap-2">
                    <a href="{{ route('babysitter.bookings.index') }}" class="btn btn-outline-primary d-flex align-items-center gap-2">
                        <i class="bi bi-calendar-check"></i> View Bookings
                    </a>
                    <a href="{{ route('babysitter.profile.index') }}" class="btn btn-outline-primary d-flex align-items-center gap-2">
                        <i class="bi bi-person"></i> Edit Profile
                    </a>
                    <a href="{{ route('babysitter.earnings.index') }}" class="btn btn-outline-primary d-flex align-items-center gap-2">
                        <i class="bi bi-currency-dollar"></i> View Earnings
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between py-3">
                    <h5 class="mb-0">Recent Bookings</h5>
                    <a href="{{ route('babysitter.bookings.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse($recent_bookings as $booking)
                            <li class="list-group-item d-flex align-items-center justify-content-between py-3">
                                <div>
                                    <p class="mb-0 fw-semibold">{{ $booking->parent->name ?? 'Unknown' }}</p>
                                    <small class="text-muted">{{ $booking->date->format('M d, Y') }} - {{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}</small>
                                </div>
                                <span class="badge rounded-pill text-bg-{{ $booking->status->value === 'completed' ? 'success' : ($booking->status->value === 'pending' ? 'warning' : ($booking->status->value === 'confirmed' ? 'primary' : 'secondary')) }}">
                                    {{ $booking->status->label() }}
                                </span>
                            </li>
                        @empty
                            <li class="list-group-item text-muted py-4 text-center">No bookings yet</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between py-3">
                    <h5 class="mb-0">Recent Reviews</h5>
                    <a href="{{ route('babysitter.reviews.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse($recent_reviews as $review)
                            <li class="list-group-item py-3">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-semibold">{{ $review->parent->name ?? 'Anonymous' }}</p>
                                        @include('partials._star-rating', ['rating' => $review->rating])
                                    </div>
                                </div>
                                @if($review->comment)
                                    <p class="mb-0 small text-muted mt-1">{{ Str::limit($review->comment, 120) }}</p>
                                @endif
                            </li>
                        @empty
                            <li class="list-group-item text-muted py-4 text-center">No reviews yet</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
