<div class="card h-100 border-0 shadow-sm">
    <div class="card-body text-center">
        <div class="mb-3">
            <img src="{{ $product->images[0] ?? 'https://via.placeholder.com/150?text=No+Image' }}"
                 alt="{{ $product->name }}"
                 class="img-fluid rounded"
                 style="height: 180px; object-fit: cover;">
        </div>
        <h6 class="fw-bold text-navy mb-1">{{ $product->name }}</h6>
        <p class="text-muted small mb-2">{{ Str::limit($product->description, 60) }}</p>
        <div class="mb-2">
            @if($product->sale_price && $product->sale_price < $product->price)
                <span class="text-decoration-line-through text-slate-grey me-2 small">PKR {{ number_format($product->price, 0) }}</span>
                <span class="fw-bold text-navy">PKR {{ number_format($product->sale_price, 0) }}</span>
            @else
                <span class="fw-bold text-navy">PKR {{ number_format($product->price, 0) }}</span>
            @endif
        </div>
        @if($product->shop)
            <a href="{{ route('shop.show', $product->shop->slug ?? '#') }}" class="text-decoration-none small text-sky-blue">
                <i class="bi bi-shop me-1"></i>{{ $product->shop->name }}
            </a>
        @endif
        <div class="mt-3">
            <a href="{{ route('marketplace.detail', $product->id) }}" class="btn btn-primary w-100">View Details</a>
        </div>
    </div>
</div>
