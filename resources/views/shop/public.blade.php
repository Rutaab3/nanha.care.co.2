@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background: linear-gradient(135deg, var(--sky-blue), var(--mint-green));">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-2 text-center mb-3 mb-md-0">
                <img src="{{ $shop->logo ? asset('storage/' . $shop->logo) : 'https://placehold.co/150x150?text=Shop' }}" alt="{{ $shop->name }}" class="rounded-circle border border-3" style="width: 120px; height: 120px; object-fit: cover; border-color: var(--white) !important;">
            </div>
            <div class="col-md-10">
                <h2 class="fw-bold mb-1" style="color: var(--dark-text);">{{ $shop->name }}</h2>
                <p class="mb-2" style="color: var(--dark-text);">{{ $shop->description }}</p>
                <div class="d-flex flex-wrap gap-3">
                    <span><i class="bi bi-geo-alt"></i> {{ $shop->city }}</span>
                    <span>
                        @include('partials._star-rating', ['rating' => $shop->averageRating()])
                        <small class="ms-1 text-muted">({{ $shop->reviews_count ?? 0 }})</small>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <h4 class="fw-bold mb-4" style="color: var(--dark-text);">Products from {{ $shop->name }}</h4>

    @if($shop->products->count() > 0)
    <div class="row g-4">
        @foreach($shop->products as $product)
        <div class="col-md-3 col-sm-6">
            @include('partials._product-card', ['product' => $product])
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-5">
        <i class="bi bi-box-seam" style="font-size: 4rem; color: var(--sky-blue);"></i>
        <h5 class="mt-3 fw-semibold" style="color: var(--dark-text);">No products available from this shop yet</h5>
        <p class="text-muted">Check back later for new arrivals.</p>
    </div>
    @endif
</div>
@endsection
