@extends('layouts.dashboard')

@section('title', 'Shop Profile')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Shop Profile</h2>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('shop-owner.profile.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Shop Logo</label>
                    @if($shop->logo)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $shop->logo) }}" alt="Logo" style="height:100px;width:auto;border-radius:8px;">
                        </div>
                    @endif
                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/jpeg,image/png,image/webp">
                    <small class="text-muted">JPEG, PNG or WebP. Max 2MB.</small>
                    @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Shop Banner</label>
                    @if($shop->banner)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $shop->banner) }}" alt="Banner" style="height:100px;width:100%;object-fit:cover;border-radius:8px;">
                        </div>
                    @endif
                    <input type="file" name="banner" class="form-control @error('banner') is-invalid @enderror" accept="image/jpeg,image/png,image/webp">
                    <small class="text-muted">JPEG, PNG or WebP. Max 5MB.</small>
                    @error('banner') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $shop->name) }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <div class="dropdown">
                            <button class="form-select text-start w-100 dropdown-toggle d-flex align-items-center justify-content-between @error('category') is-invalid @enderror"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="cursor:pointer; background:#fff; border:1px solid #dee2e6; padding:.375rem .75rem;"
                                    id="categoryDropdown">
                                <span id="categoryText" style="color: #6c757d;">Select categories</span>
                            </button>
                            <ul class="dropdown-menu w-100 p-2" aria-labelledby="categoryDropdown" style="max-height:260px; overflow-y:auto;">
                                @php $selected = old('category', $shop->category ?? []); @endphp
                                @foreach(\App\Enums\ShopCategory::labels() as $value => $label)
                                    <li>
                                        <label class="dropdown-item d-flex align-items-center gap-2 px-2 py-1" style="cursor:pointer;">
                                            <input type="checkbox" class="category-checkbox" value="{{ $value }}"
                                                   @checked(in_array($value, $selected))>
                                            {{ $label }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                            <input type="hidden" name="category" id="categoryInput" value="{{ json_encode($selected) }}">
                        </div>
                        @error('category') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $shop->description) }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Contact Info</label>
                <textarea name="contact_info" class="form-control @error('contact_info') is-invalid @enderror" rows="5" placeholder="Phone, email, address etc.">{{ old('contact_info', $shop->contact_info) }}</textarea>
                @error('contact_info') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Return Policy</label>
                <textarea name="return_policy" class="form-control @error('return_policy') is-invalid @enderror" rows="5">{{ old('return_policy', $shop->return_policy) }}</textarea>
                @error('return_policy') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-check-circle"></i> Save
            </button>
        </form>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.category-checkbox');
        const categoryText = document.getElementById('categoryText');
        const categoryInput = document.getElementById('categoryInput');
        const dropdown = document.querySelector('#categoryDropdown');

        function updateSelection() {
            const checked = Array.from(checkboxes).filter(cb => cb.checked);
            const values = checked.map(cb => cb.value);
            categoryInput.value = JSON.stringify(values);
            categoryText.textContent = checked.length
                ? checked.map(cb => cb.closest('label').textContent.trim()).join(', ')
                : 'Select categories';
            categoryText.style.color = checked.length ? '#212529' : '#6c757d';
        }

        checkboxes.forEach(cb => {
            cb.addEventListener('change', updateSelection);
        });

        updateSelection();
    });
</script>
@endpush

@endsection
