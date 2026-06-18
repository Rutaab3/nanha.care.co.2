@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4" style="color: var(--dark-text);"><i class="bi bi-cart"></i> Shopping Cart</h2>

    @if($cartItems->count() > 0)
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ $item->product->images->first()->path ? asset('storage/' . $item->product->images->first()->path) : 'https://placehold.co/80x80?text=Product' }}" alt="{{ $item->product->name }}" style="width: 60px; height: 60px; object-fit: cover;" class="rounded">
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $item->product->name }}</h6>
                                        <small class="text-muted">{{ $item->product->category }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>Rs. {{ number_format($item->product->price) }}</td>
                            <td>
                                <div class="input-group input-group-sm" style="max-width: 120px;">
                                    <form method="POST" action="{{ route('cart.update', $item->id) }}" class="d-flex align-items-center">
                                        @csrf
                                        <button type="button" class="btn btn-outline-secondary" onclick="this.parentNode.querySelector('input[name=quantity]').stepDown(); this.parentNode.submit();">-</button>
                                        <input type="number" name="quantity" class="form-control text-center" value="{{ $item->quantity }}" min="1">
                                        <button type="button" class="btn btn-outline-secondary" onclick="this.parentNode.querySelector('input[name=quantity]').stepUp(); this.parentNode.submit();">+</button>
                                    </form>
                                </div>
                            </td>
                            <td class="fw-semibold">Rs. {{ number_format($item->product->price * $item->quantity) }}</td>
                            <td>
                                <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0" style="background-color: var(--off-white);">
                <div class="card-body">
                    <h5 class="fw-bold mb-4" style="color: var(--dark-text);">Cart Summary</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span class="fw-semibold">Rs. {{ number_format($total) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Shipping</span>
                        <span class="fw-semibold" style="color: var(--mint-green);">Free</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold">Total</span>
                        <span class="fw-bold fs-5" style="color: var(--dark-text);">Rs. {{ number_format($total) }}</span>
                    </div>
                    <a href="{{ route('cart.checkout') }}" class="btn w-100 py-2 fw-semibold" style="background-color: var(--mint-green); color: var(--dark-text);">
                        <i class="bi bi-credit-card"></i> Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <i class="bi bi-cart-x" style="font-size: 5rem; color: var(--sky-blue);"></i>
        <h4 class="mt-3 fw-semibold" style="color: var(--dark-text);">Your cart is empty</h4>
        <p class="text-muted">Looks like you haven't added anything yet.</p>
        <a href="{{ route('marketplace.index') }}" class="btn btn-primary btn-lg"><i class="bi bi-shop"></i> Browse Products</a>
    </div>
    @endif
</div>
@endsection
