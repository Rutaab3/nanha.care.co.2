@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <h4 class="mb-4">Welcome back, {{ auth()->user()->name }}!</h4>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <x-stats-card icon="calendar-check" label="Total Bookings" :value="$total_bookings" color="var(--sky-blue)" />
        </div>
        <div class="col-md-4">
            <x-stats-card icon="clock" label="Active Bookings" :value="$active_bookings" color="var(--baby-pink)" />
        </div>
        <div class="col-md-4">
            <x-stats-card icon="box" label="Total Orders" :value="$total_orders" color="var(--mint-green)" />
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex align-items-center justify-content-between py-3">
                    <h6 class="mb-0 fw-semibold">Recent Bookings</h6>
                    <a href="{{ route('parent.bookings.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    @forelse($recent_bookings as $booking)
                        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                            <div>
                                <p class="fw-semibold mb-1">{{ $booking->babysitter->name ?? 'N/A' }}</p>
                                <small class="text-muted">{{ $booking->date->format('M d, Y') }} · {{ $booking->start_time }} · {{ $booking->duration_hours }}h</small>
                            </div>
                            <span class="badge rounded-pill
                                @if($booking->status->value === 'completed') bg-success
                                @elseif($booking->status->value === 'confirmed') bg-primary
                                @elseif($booking->status->value === 'pending') bg-warning text-dark
                                @elseif($booking->status->value === 'cancelled') bg-secondary
                                @else bg-light text-dark
                                @endif">
                                {{ ucfirst($booking->status->value) }}
                            </span>
                        </div>
                    @empty
                        <p class="text-muted text-center py-4 mb-0">No bookings yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex align-items-center justify-content-between py-3">
                    <h6 class="mb-0 fw-semibold">Recent Orders</h6>
                    <a href="{{ route('parent.orders.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    @forelse($recent_orders as $order)
                        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                            <div>
                                <p class="fw-semibold mb-1">Order #{{ $order->id }}</p>
                                <small class="text-muted">${{ number_format($order->total, 2) }} · {{ $order->created_at->format('M d, Y') }}</small>
                            </div>
                            <span class="badge rounded-pill
                                @if($order->status->value === 'delivered') bg-success
                                @elseif($order->status->value === 'shipped') bg-info
                                @elseif($order->status->value === 'processing') bg-primary
                                @elseif($order->status->value === 'cancelled') bg-secondary
                                @else bg-warning text-dark
                                @endif">
                                {{ ucfirst($order->status->value) }}
                            </span>
                        </div>
                    @empty
                        <p class="text-muted text-center py-4 mb-0">No orders yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
