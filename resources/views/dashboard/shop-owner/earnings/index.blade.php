@extends('layouts.dashboard')

@section('title', 'Earnings')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Earnings</h2>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-6 col-lg-3">
        @include('components.stats-card', ['icon' => 'currency-dollar', 'label' => 'Total Revenue', 'value' => 'PKR ' . number_format($earnings['total_revenue'], 2), 'color' => 'var(--mint-green)'])
    </div>
    <div class="col-md-6 col-lg-3">
        @include('components.stats-card', ['icon' => 'wallet2', 'label' => 'Pending Payout', 'value' => 'PKR ' . number_format($earnings['pending_payout'], 2), 'color' => 'var(--sunshine-yellow)'])
    </div>
    <div class="col-md-6 col-lg-3">
        @include('components.stats-card', ['icon' => 'cart', 'label' => 'Total Orders', 'value' => $earnings['total_orders'], 'color' => 'var(--sky-blue)'])
    </div>
    <div class="col-md-6 col-lg-3">
        @include('components.stats-card', ['icon' => 'percent', 'label' => 'Commission Rate', 'value' => $earnings['commission_percent'] . '%', 'color' => 'var(--baby-pink)'])
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom-0 pt-3 px-4">
                <h5 class="fw-bold mb-0">Revenue Overview</h5>
            </div>
            <div class="card-body">
                <canvas id="revenueChart" height="300"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom-0 pt-3 px-4">
                <h5 class="fw-bold mb-0">Request Payout</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('shop-owner.earnings.payout') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Amount (PKR)</label>
                        <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror"
                               value="{{ old('amount') }}" min="500" step="0.01" required>
                        @error('amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <p class="small text-muted mb-3">
                        <i class="bi bi-info-circle"></i> Minimum payout: PKR 500. Processed within 3-5 business days.
                    </p>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-send"></i> Request Payout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom-0 pt-3 px-4">
        <h5 class="fw-bold mb-0">Payout History</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Amount</th>
                        <th>Status</th>
                        <th>Requested Date</th>
                        <th>Processed Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payoutHistory as $payout)
                    <tr>
                        <td class="ps-4 fw-semibold">PKR {{ number_format($payout->amount, 2) }}</td>
                        <td>
                            @php
                                $statusColors = ['pending' => 'warning', 'approved' => 'success', 'paid' => 'info', 'rejected' => 'danger'];
                            @endphp
                            <span class="badge bg-{{ $statusColors[$payout->status] ?? 'secondary' }}">
                                {{ ucfirst($payout->status) }}
                            </span>
                        </td>
                        <td>{{ $payout->created_at->format('d M Y') }}</td>
                        <td>{{ $payout->processed_at ? $payout->processed_at->format('d M Y') : '—' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">No payout requests yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/chart.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('{{ route("shop-owner.earnings.chart-data") }}')
        .then(function (res) { return res.json(); })
        .then(function (data) {
            new Chart(document.getElementById('revenueChart'), {
                type: 'line',
                data: {
                    labels: data.labels ?? [],
                    datasets: [{
                        label: 'Revenue',
                        data: data.values ?? [],
                        borderColor: 'var(--mint-green)',
                        backgroundColor: 'rgba(152, 216, 200, 0.2)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
        });
});
</script>
@endpush
