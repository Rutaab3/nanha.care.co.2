@extends('layouts.dashboard')

@section('title', 'Shop Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Shop Dashboard</h2>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4 col-lg-2">
        @include('components.stats-card', ['icon' => 'box-seam', 'label' => 'Total Products', 'value' => $overview['total_products'], 'color' => 'var(--sky-blue)'])
    </div>
    <div class="col-md-4 col-lg-2">
        @include('components.stats-card', ['icon' => 'cart', 'label' => 'Total Orders', 'value' => $overview['total_orders'], 'color' => 'var(--mint-green)'])
    </div>
    <div class="col-md-4 col-lg-2">
        @include('components.stats-card', ['icon' => 'clock', 'label' => 'Pending Orders', 'value' => $overview['pending_orders'], 'color' => 'var(--sunshine-yellow)'])
    </div>
    <div class="col-md-4 col-lg-2">
        @include('components.stats-card', ['icon' => 'currency-dollar', 'label' => 'Total Revenue', 'value' => 'PKR ' . number_format($overview['total_revenue'], 2), 'color' => 'var(--mint-green)'])
    </div>
    <div class="col-md-4 col-lg-2">
        @include('components.stats-card', ['icon' => 'star', 'label' => 'Avg. Rating', 'value' => number_format($overview['avg_rating'], 1), 'color' => 'var(--sunshine-yellow)'])
    </div>
    <div class="col-md-4 col-lg-2">
        @include('components.stats-card', ['icon' => 'chat-quote', 'label' => 'Total Reviews', 'value' => $overview['total_reviews'], 'color' => 'var(--baby-pink)'])
    </div>
</div>

@if($overview['pending_orders'] > 0)
<div class="alert alert-warning d-flex align-items-center gap-2 mb-4">
    <i class="bi bi-exclamation-triangle-fill"></i>
    <span>You have <strong>{{ $overview['pending_orders'] }}</strong> pending {{ Str::plural('order', $overview['pending_orders']) }}.</span>
    <a href="{{ route('shop-owner.orders.index') }}" class="ms-auto btn btn-sm btn-outline-warning">View Orders</a>
</div>
@endif

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom-0 pt-3 px-4">
                <h5 class="fw-bold mb-0">Best Sellers</h5>
            </div>
            <div class="card-body">
                <canvas id="bestSellersChart" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom-0 pt-3 px-4">
                <h5 class="fw-bold mb-0">Quick Links</h5>
            </div>
            <div class="card-body d-flex flex-column gap-3">
                <a href="{{ route('shop-owner.products.create') }}" class="btn btn-primary btn-lg d-flex align-items-center gap-2">
                    <i class="bi bi-plus-circle"></i> Add Product
                </a>
                <a href="{{ route('shop-owner.orders.index') }}" class="btn btn-lg btn-outline-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-eye"></i> View Orders
                </a>
                <a href="{{ route('shop-owner.profile.index') }}" class="btn btn-lg btn-outline-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-pencil"></i> Edit Shop Profile
                </a>
            </div>
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
            new Chart(document.getElementById('bestSellersChart'), {
                type: 'bar',
                data: {
                    labels: data.labels ?? [],
                    datasets: [{
                        label: 'Revenue',
                        data: data.values ?? [],
                        backgroundColor: 'rgba(135, 206, 235, 0.6)',
                        borderColor: 'var(--sky-blue)',
                        borderWidth: 2
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
