@extends('layouts.dashboard')

@section('title', 'My Orders')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0">My Orders</h4>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Order #</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td class="fw-semibold">#{{ $order->id }}</td>
                            <td>{{ $order->items->count() }} item(s)</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>
                                <span class="badge rounded-pill
                                    @if($order->status->value === 'delivered') bg-success
                                    @elseif($order->status->value === 'shipped') bg-info
                                    @elseif($order->status->value === 'processing') bg-primary
                                    @elseif($order->status->value === 'cancelled') bg-secondary
                                    @else bg-warning text-dark
                                    @endif">
                                    {{ ucfirst($order->status->value) }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('parent.orders.details', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-box fs-1 d-block mb-2"></i>
                                No orders yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
