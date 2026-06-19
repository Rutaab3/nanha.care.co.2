<div class="card h-100 border-0 shadow-sm">
    <img src="{{ $product->images->first()->path ? asset('storage/' . $product->images->first()->path) : 'https://placehold.co/300x300?text=Product' }}"
         alt="{{ $product->name }}"
         class="card-img-top"
         style="height: 200px; object-fit: cover;">
    <div class="card-body d-flex flex-column">
        <h6 class="card-title mb-1">{{ $product->name }}</h6>
        <p class="mb-1">
            @if(isset($product->sale_price) && $product->sale_price < $product->price)
                <span class="fw-bold" style="color: var(--dark-text);">PKR {{ number_format($product->sale_price, 0) }}</span>
                <span class="text-muted text-decoration-line-through ms-1 small">PKR {{ number_format($product->price, 0) }}</span>
            @else
                <span class="fw-bold" style="color: var(--dark-text);">PKR {{ number_format($product->price, 0) }}</span>
            @endif
        </p>
        <p class="text-muted small mb-2">
            <a href="{{ route('shop.show', $product->shop->slug ?? '#') }}" class="text-decoration-none" style="color: var(--sky-blue);">
                <i class="bi bi-shop me-1"></i>{{ $product->shop->name ?? 'Unknown Shop' }}
            </a>
        </p>
        @if(isset($product->avgRating))
            @include('partials._star-rating', ['rating' => $product->avgRating])
        @endif
        <div class="mt-auto pt-2">
            <a href="{{ route('marketplace.detail', $product->id) }}" class="btn w-100" style="background-color: var(--sky-blue); color: var(--dark-text);">
                <i class="bi bi-info-circle me-1"></i>Details
            </a>
        </div>
    </div>
</div>
