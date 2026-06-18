@extends('layouts.dashboard')

@section('title', 'Revenue')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Revenue Overview</h2>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        @include('components.stats-card', ['icon' => 'cash-stack', 'value' => '$'.number_format($totalRevenue, 2), 'label' => 'Total Revenue', 'color' => 'var(--mint-green)'])
    </div>
    <div class="col-md-3">
        @include('components.stats-card', ['icon' => 'arrow-up-circle', 'value' => '$'.number_format($totalPayouts, 2), 'label' => 'Total Payouts', 'color' => 'var(--baby-pink)'])
    </div>
    <div class="col-md-3">
        @include('components.stats-card', ['icon' => 'clock', 'value' => '$'.number_format($pendingPayouts, 2), 'label' => 'Pending Payouts', 'color' => 'var(--sunshine-yellow)'])
    </div>
    <div class="col-md-3">
        @include('components.stats-card', ['icon' => 'wallet2', 'value' => '$'.number_format($netRevenue, 2), 'label' => 'Net Revenue', 'color' => 'var(--sky-blue)'])
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom-0 pt-3">
        <h5 class="fw-bold mb-0">Recent Delivered Orders</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Order #</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->parent?->name ?? 'Unknown' }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td class="text-muted small">{{ $order->created_at->format('M d, Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">No delivered orders yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
