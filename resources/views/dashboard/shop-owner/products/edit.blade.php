@extends('layouts.dashboard')

@section('title', 'Edit Product — ' . $product->name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Edit Product — {{ $product->name }}</h2>
    <a href="{{ route('shop-owner.products.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

@if($product->status === 'rejected' && $product->rejection_reason)
<div class="alert alert-danger d-flex align-items-center gap-2 mb-4">
    <i class="bi bi-exclamation-triangle-fill"></i>
    <span><strong>Rejection Reason:</strong> {{ $product->rejection_reason }}</span>
</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('shop-owner.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $product->name) }}" required maxlength="200">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="8">{{ old('description', $product->description) }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Price (PKR)</label>
                        <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror"
                               value="{{ old('price', $product->price) }}" required min="1">
                        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sale Price (PKR) <small class="text-muted">optional</small></label>
                        <input type="number" step="0.01" name="sale_price" class="form-control @error('sale_price') is-invalid @enderror"
                               value="{{ old('sale_price', $product->sale_price) }}" min="0">
                        @error('sale_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stock Qty</label>
                        <input type="number" name="stock_qty" class="form-control @error('stock_qty') is-invalid @enderror"
                               value="{{ old('stock_qty', $product->stock_qty) }}" required min="0">
                        @error('stock_qty') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->value }}" @selected(old('category', $product->category) === $category->value)>
                                    {{ $category->label() }}
                                </option>
                            @endforeach
                        </select>
                        @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Age Tags</label>
                        <div class="row g-2">
                            @foreach($categories as $tag)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="age_tags[]"
                                               value="{{ $tag->value }}" id="tag_{{ $tag->value }}"
                                               @checked(in_array($tag->value, old('age_tags', $product->age_tags ?? [])))>
                                        <label class="form-check-label" for="tag_{{ $tag->value }}">
                                            {{ $tag->label() }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('age_tags') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Weight (KG) <small class="text-muted">optional</small></label>
                        <input type="number" step="0.01" name="weight" class="form-control @error('weight') is-invalid @enderror"
                               value="{{ old('weight', $product->weight) }}" min="0">
                        @error('weight') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured" value="1"
                               @checked(old('is_featured', $product->is_featured))>
                        <label class="form-check-label" for="is_featured">Is Featured</label>
                    </div>
                </div>
            </div>

            <hr>

            <div class="mb-3">
                <label class="form-label">Current Images</label>
                <div class="row g-2">
                    @foreach($product->images as $image)
                    <div class="col-md-2 col-4 position-relative">
                        <img src="{{ asset('storage/' . $image->path) }}" class="img-thumbnail" style="height:120px;width:100%;object-fit:cover;">
                        <form method="POST" action="{{ route('shop-owner.products.images.delete', $image->id) }}" class="position-absolute top-0 end-0 m-1">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger rounded-circle p-0" style="width:24px;height:24px;font-size:12px;line-height:24px;">
                                <i class="bi bi-x"></i>
                            </button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Add New Images <small class="text-muted">(max 5 total, JPEG/PNG/WebP, 2MB each)</small></label>
                <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror" multiple accept="image/jpeg,image/png,image/webp" id="imagesInput">
                @error('images') <div class="invalid-feedback">{{ $message }}</div> @enderror
                @error('images.*') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                <div id="imagePreview" class="row g-2 mt-2"></div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" name="action" value="draft" class="btn btn-outline-secondary">
                    <i class="bi bi-save"></i> Save as Draft
                </button>
                <button type="submit" name="action" value="submit" class="btn btn-primary">
                    <i class="bi bi-send-check"></i> Resubmit for Review
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('imagesInput').addEventListener('change', function () {
        const preview = document.getElementById('imagePreview');
        preview.innerHTML = '';
        Array.from(this.files).slice(0, 5).forEach(function (file) {
            const reader = new FileReader();
            reader.onload = function (ev) {
                const col = document.createElement('div');
                col.className = 'col-md-3 col-4';
                col.innerHTML = '<img src="' + ev.target.result + '" class="img-thumbnail" style="height:120px;width:100%;object-fit:cover;">';
                preview.appendChild(col);
            };
            reader.readAsDataURL(file);
        });
    });
});
</script>
@endpush
