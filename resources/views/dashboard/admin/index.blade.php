@extends('layouts.dashboard')

@section('title', 'Admin Overview')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Admin Overview</h2>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4 col-lg-2">
        @include('components.stats-card', ['icon' => 'people', 'value' => $overview['total_users'], 'label' => 'Total Users', 'color' => 'var(--sky-blue)'])
    </div>
    <div class="col-md-4 col-lg-2">
        @include('components.stats-card', ['icon' => 'calendar-check', 'value' => $overview['total_bookings'], 'label' => 'Total Bookings', 'color' => 'var(--mint-green)'])
    </div>
    <div class="col-md-4 col-lg-2">
        @include('components.stats-card', ['icon' => 'shop', 'value' => $overview['active_listings'], 'label' => 'Active Listings', 'color' => 'var(--sunshine-yellow)'])
    </div>
    <div class="col-md-4 col-lg-2">
        @include('components.stats-card', ['icon' => 'star', 'value' => $overview['pending_reviews'], 'label' => 'Pending Reviews', 'color' => 'var(--baby-pink)'])
    </div>
    <div class="col-md-4 col-lg-2">
        @include('components.stats-card', ['icon' => 'currency-dollar', 'value' => number_format($overview['monthly_revenue'], 2), 'label' => 'Monthly Revenue', 'color' => 'var(--mint-green)'])
    </div>
    <div class="col-md-4 col-lg-2">
        @include('components.stats-card', ['icon' => 'ticket', 'value' => $overview['open_tickets'], 'label' => 'Open Tickets', 'color' => 'var(--baby-pink)'])
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom-0 pt-3">
                <h5 class="fw-bold mb-0">Recent Activity</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Type</th>
                                <th>Action</th>
                                <th>User</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentActivity as $activity)
                                <tr>
                                    <td>
                                        @if($activity instanceof \App\Models\System\ModerationLog)
                                            <span class="badge bg-info">Moderation</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Role Assignment</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($activity instanceof \App\Models\System\ModerationLog)
                                            {{ ucfirst($activity->action) }} on {{ class_basename($activity->target_type) }} #{{ $activity->target_id }}
                                        @else
                                            Changed role to {{ $activity->new_role }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($activity instanceof \App\Models\System\ModerationLog)
                                            {{ $activity->moderator?->name ?? 'Unknown' }}
                                        @else
                                            {{ $activity->admin?->name ?? 'Unknown' }}
                                        @endif
                                    </td>
                                    <td class="text-muted small">
                                        {{ $activity instanceof \App\Models\System\ModerationLog ? $activity->submitted_at?->diffForHumans() : $activity->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">No recent activity.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom-0 pt-3">
                <h5 class="fw-bold mb-0">Platform Health</h5>
            </div>
            <div class="card-body text-center py-4">
                @if($dbHealthy)
                    <i class="bi bi-check-circle-fill" style="font-size: 3rem; color: var(--mint-green);"></i>
                    <p class="fw-bold text-success mt-2 mb-0">All Systems Operational</p>
                @else
                    <i class="bi bi-x-circle-fill" style="font-size: 3rem; color: var(--baby-pink);"></i>
                    <p class="fw-bold text-danger mt-2 mb-0">System Issues Detected</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
