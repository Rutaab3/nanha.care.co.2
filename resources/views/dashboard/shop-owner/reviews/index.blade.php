@extends('layouts.dashboard')

@section('title', 'Product Reviews')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Product Reviews</h2>
</div>

<form method="GET" class="row g-2 mb-4">
    <div class="col-auto">
        <select name="product" class="form-select">
            <option value="">All Products</option>
        </select>
    </div>
    <div class="col-auto">
        <select name="rating" class="form-select">
            <option value="">All Ratings</option>
            @for($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" @selected(request('rating') == $i)>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
            @endfor
        </select>
    </div>
    <div class="col-auto">
        <div class="form-check form-switch h-100 d-flex align-items-center">
            <input class="form-check-input" type="checkbox" name="flagged" value="1" id="flaggedFilter" @checked(request('flagged')) onchange="this.form.submit()">
            <label class="form-check-label ms-1" for="flaggedFilter">Flagged</label>
        </div>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-outline-secondary">Filter</button>
        <a href="{{ route('shop-owner.reviews.index') }}" class="btn btn-outline-danger">Clear</a>
    </div>
</form>

@forelse($reviews as $review)
<div class="card border-0 shadow-sm mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-start mb-2">
            <div>
                <a href="#" class="fw-semibold text-decoration-none">{{ $review->product->name ?? 'Unknown Product' }}</a>
                <div class="d-flex align-items-center gap-2 mt-1">
                    <span class="fw-semibold small">{{ $review->user->name ?? 'Anonymous' }}</span>
                    <span class="badge" style="background-color: var(--mint-green); color: var(--dark-text); font-size: 0.7rem;">
                        {{ $review->user->getRoleNames()->first() ?? 'Buyer' }}
                    </span>
                </div>
            </div>
            <div class="d-flex gap-2">
                @if(!$review->is_flagged)
                <form method="POST" action="{{ route('shop-owner.reviews.flag', $review->id) }}" id="flag-review-{{ $review->id }}" class="d-inline">
                    @csrf
                    <button type="button" class="btn btn-sm btn-outline-warning" data-confirm-form="flag-review-{{ $review->id }}">
                        <i class="bi bi-flag"></i> Flag
                    </button>
                </form>
                @else
                <span class="badge bg-warning text-dark"><i class="bi bi-flag-fill"></i> Flagged</span>
                @endif
            </div>
        </div>

        @include('partials._star-rating', ['rating' => $review->rating])

        <p class="mt-2 mb-0">{{ $review->review }}</p>

        @if($review->reply)
            <div class="bg-light rounded p-3 mt-3">
                <p class="small fw-semibold mb-1"><i class="bi bi-reply-fill"></i> Your Reply</p>
                <p class="mb-0">{{ $review->reply }}</p>
            </div>
        @else
            <form method="POST" action="{{ route('shop-owner.reviews.reply', $review->id) }}" class="mt-3">
                @csrf
                <textarea name="reply" class="form-control form-control-sm @error('reply.' . $review->id) is-invalid @enderror" rows="2" placeholder="Write a reply..." required></textarea>
                @error('reply.' . $review->id) <div class="invalid-feedback">{{ $message }}</div> @enderror
                <button type="submit" class="btn btn-sm btn-outline-primary mt-2">
                    <i class="bi bi-send"></i> Reply
                </button>
            </form>
        @endif
    </div>
</div>
@empty
<div class="card border-0 shadow-sm">
    <div class="card-body text-center text-muted py-5">
        <i class="bi bi-chat-square-text fs-1"></i>
        <p class="mt-2 mb-0">No reviews found.</p>
    </div>
</div>
@endforelse

@include('partials._pagination', ['paginator' => $reviews])
@endsection
