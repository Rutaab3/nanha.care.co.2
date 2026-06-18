@extends('layouts.dashboard')

@section('title', 'Order #{{ $order->id }}')

@section('content')
    <div class="mb-3">
        <a href="{{ route('parent.orders.index') }}" class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left"></i> Back to Orders
        </a>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex align-items-center justify-content-between py-3">
                    <h5 class="mb-0">Order #{{ $order->id }}</h5>
                    <span class="badge rounded-pill fs-6
                        @if($order->status->value === 'delivered') bg-success
                        @elseif($order->status->value === 'shipped') bg-info
                        @elseif($order->status->value === 'processing') bg-primary
                        @elseif($order->status->value === 'cancelled') bg-secondary
                        @else bg-warning text-dark
                        @endif">
                        {{ ucfirst($order->status->value) }}
                    </span>
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->name ?? 'Product #' . $item->product_id }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>${{ number_format($item->unit_price, 2) }}</td>
                                    <td class="text-end">${{ number_format($item->total, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <td colspan="3" class="text-end fw-semibold">Total</td>
                                <td class="text-end fw-bold">${{ number_format($order->total, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h6 class="mb-0 fw-semibold">Order Details</h6>
                </div>
                <div class="card-body">
                    <p class="mb-2"><strong>Date:</strong><br>{{ $order->created_at->format('F d, Y h:i A') }}</p>
                    <p class="mb-2"><strong>Payment:</strong><br>{{ ucfirst(str_replace('_', ' ', $order->payment_method ?? 'N/A')) }}</p>
                    <p class="mb-0"><strong>Shipping Address:</strong><br>
                        @if($order->shipping_address)
                            {{ implode(', ', $order->shipping_address) }}
                        @else
                            <span class="text-muted">Not provided</span>
                        @endif
                    </p>
                </div>
            </div>

            @if(in_array($order->status->value, ['delivered']))
                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-header bg-white">
                        <h6 class="mb-0 fw-semibold">Need Help?</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('parent.orders.return', $order->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="reason" class="form-label">Return Reason</label>
                                <textarea name="reason" id="reason" class="form-control" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100">Request Return</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
