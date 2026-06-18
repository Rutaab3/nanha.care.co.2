@extends('layouts.dashboard')

@section('title', 'My Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">My Products</h2>
    <a href="{{ route('shop-owner.products.create') }}" class="btn text-white" style="background-color: var(--sky-blue);">
        <i class="bi bi-plus-circle"></i> Add Product
    </a>
</div>

<form method="GET" class="row g-2 mb-4">
    <div class="col-auto">
        <select name="status" class="form-select" onchange="this.form.submit()">
            <option value="">All Statuses</option>
            @foreach(['draft', 'under_review', 'published', 'rejected', 'archived'] as $s)
                <option value="{{ $s }}" @selected(request('status') === $s)>{{ ucfirst(str_replace('_', ' ', $s)) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-auto flex-grow-1">
        <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-outline-secondary">Search</button>
        <a href="{{ route('shop-owner.products.index') }}" class="btn btn-outline-danger">Clear</a>
    </div>
</form>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width:60px;">Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th class="pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td class="ps-4">
                            @if($product->images->first())
                                <img src="{{ asset('storage/' . $product->images->first()->path) }}" alt="{{ $product->name }}"
                                     style="width:48px;height:48px;object-fit:cover;border-radius:6px;">
                            @else
                                <div style="width:48px;height:48px;border-radius:6px;background:#e9ecef;display:flex;align-items:center;justify-content:center;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $product->name }}</td>
                        <td><span class="badge" style="background-color: var(--mint-green); color: var(--dark-text);">{{ $product->category }}</span></td>
                        <td>PKR {{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock_qty }}</td>
                        <td>
                            @php
                                $statusColors = ['draft' => 'secondary', 'under_review' => 'warning', 'published' => 'success', 'rejected' => 'danger', 'archived' => 'light text-dark'];
                            @endphp
                            <span class="badge bg-{{ explode(' ', $statusColors[$product->status->value] ?? 'secondary')[0] }}">
                                {{ ucfirst(str_replace('_', ' ', $product->status)) }}
                            </span>
                        </td>
                        <td>{{ $product->created_at->format('d M Y') }}</td>
                        <td class="pe-4">
                            <div class="d-flex gap-1">
                                <a href="{{ route('shop-owner.products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="POST" action="{{ route('shop-owner.products.duplicate', $product->id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-files"></i>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('shop-owner.products.archive', $product->id) }}" id="archive-product-{{ $product->id }}" class="d-inline">
                                    @csrf
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-confirm-form="archive-product-{{ $product->id }}">
                                        <i class="bi bi-archive"></i>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('shop-owner.products.delete', $product->id) }}" id="delete-product-{{ $product->id }}" class="d-inline">
                                    @csrf
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-confirm-form="delete-product-{{ $product->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">No products found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('partials._pagination', ['paginator' => $products])
@endsection
