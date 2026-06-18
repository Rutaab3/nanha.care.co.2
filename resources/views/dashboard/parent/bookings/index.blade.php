@extends('layouts.dashboard')

@section('title', 'My Bookings')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0">My Bookings</h4>
        <a href="{{ route('babysitters.index') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> New Booking
        </a>
    </div>

    <ul class="nav nav-tabs mb-4">
        @php $tabs = ['upcoming' => 'Upcoming', 'pending' => 'Pending', 'confirmed' => 'Confirmed', 'completed' => 'Completed', 'cancelled' => 'Cancelled']; @endphp
        @foreach($tabs as $key => $label)
            <li class="nav-item">
                <a class="nav-link {{ $tab === $key ? 'active' : '' }}" href="{{ route('parent.bookings.index', ['tab' => $key]) }}">
                    {{ $label }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Babysitter</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Duration</th>
                        <th>Location</th>
                        <th>Fee</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td class="fw-semibold">{{ $booking->babysitter->name ?? 'N/A' }}</td>
                            <td>{{ $booking->date->format('M d, Y') }}</td>
                            <td>{{ $booking->start_time }}</td>
                            <td>{{ $booking->duration_hours }}h</td>
                            <td>{{ $booking->location ?? '—' }}</td>
                            <td>${{ number_format($booking->total_fee, 2) }}</td>
                            <td>
                                <span class="badge rounded-pill
                                    @if($booking->status->value === 'completed') bg-success
                                    @elseif($booking->status->value === 'confirmed') bg-primary
                                    @elseif($booking->status->value === 'pending') bg-warning text-dark
                                    @elseif($booking->status->value === 'cancelled') bg-secondary
                                    @else bg-light text-dark
                                    @endif">
                                    {{ ucfirst($booking->status->value) }}
                                </span>
                            </td>
                            <td class="text-end">
                                @if($booking->status->value === 'completed')
                                    <a href="{{ route('parent.bookings.review-form', $booking->id) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-star"></i> Review
                                    </a>
                                @endif
                                @if(in_array($booking->status->value, ['pending', 'confirmed']))
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-confirm-form="cancel-booking-{{ $booking->id }}">
                                        <i class="bi bi-x-circle"></i> Cancel
                                    </button>
                                    <form method="POST" action="{{ route('parent.bookings.report', $booking->id) }}" id="cancel-booking-{{ $booking->id }}" class="d-none">
                                        @csrf
                                        <input type="hidden" name="reason" value="Cancelled by parent">
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="bi bi-calendar-x fs-1 d-block mb-2"></i>
                                No {{ $tab }} bookings found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
