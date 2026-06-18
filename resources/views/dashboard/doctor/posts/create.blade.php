@extends('layouts.dashboard')

@section('title', 'Write New Blog Post')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Write New Blog Post</h2>
    <a href="{{ route('doctor.posts.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('doctor.posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" required maxlength="200">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                               value="{{ old('slug') }}" readonly>
                        @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <div class="form-text">Auto-generated from title. Click to edit.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Excerpt <small class="text-muted">(max 200 characters)</small></label>
                        <textarea name="excerpt" id="excerpt" class="form-control @error('excerpt') is-invalid @enderror"
                                  maxlength="200" rows="3">{{ mb_substr(old('excerpt') ?? '', 0, 200) }}</textarea>
                        @error('excerpt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <div class="form-text text-end"><span id="charCount">0</span>/200</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tags <small class="text-muted">(comma separated)</small></label>
                        <input type="text" name="tags" class="form-control @error('tags') is-invalid @enderror"
                               value="{{ is_array(old('tags')) ? implode(', ', old('tags')) : old('tags') }}" placeholder="e.g. newborn, care, feeding">
                        @error('tags') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Cover Image <small class="text-muted">(JPEG/PNG/WebP, max 3MB)</small></label>
                        <input type="file" name="cover_image" id="coverImage" class="form-control @error('cover_image') is-invalid @enderror"
                               accept="image/jpeg,image/png,image/webp" required>
                        @error('cover_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <div id="coverPreview" class="mt-2"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach(\App\Enums\BlogCategory::cases() as $category)
                                <option value="{{ $category->value }}" @selected(old('category') === $category->value)>
                                    {{ $category->label() }}
                                </option>
                            @endforeach
                        </select>
                        @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Read Time <small class="text-muted">(minutes)</small></label>
                        <input type="number" name="read_time_minutes" id="readTime"
                               class="form-control" value="1" readonly>
                        <div class="form-text">Auto-calculated from content.</div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror"
                          rows="16">{{ old('content') }}</textarea>
                @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" name="action" value="draft" class="btn btn-outline-secondary">
                    <i class="bi bi-save"></i> Save as Draft
                </button>
                <button type="submit" name="action" value="submit" class="btn text-white" style="background-color: var(--sky-blue);">
                    <i class="bi bi-send-check"></i> Submit for Review
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function slugify(text) {
    return text.toString().toLowerCase().trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_]+/g, '-')
        .replace(/^-+|-+$/g, '');
}

document.addEventListener('DOMContentLoaded', function () {
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    const excerptInput = document.getElementById('excerpt');
    const charCount = document.getElementById('charCount');
    const readTimeInput = document.getElementById('readTime');
    const coverInput = document.getElementById('coverImage');
    const coverPreview = document.getElementById('coverPreview');

    let slugLocked = false;

    titleInput.addEventListener('input', function () {
        if (!slugLocked) {
            slugInput.value = slugify(this.value);
        }
    });

    slugInput.addEventListener('click', function () {
        slugLocked = !slugLocked;
        this.removeAttribute('readonly');
        this.focus();
    });

    slugInput.addEventListener('blur', function () {
        if (this.value !== slugify(titleInput.value)) {
            slugLocked = true;
        }
    });

    excerptInput.addEventListener('input', function () {
        charCount.textContent = this.value.length;
    });
    charCount.textContent = excerptInput.value.length;

    coverInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                coverPreview.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="max-height:200px;width:100%;object-fit:cover;">';
            };
            reader.readAsDataURL(file);
        }
    });

    const contentInput = document.getElementById('content');
    contentInput.addEventListener('input', function () {
        const words = this.value.trim() ? this.value.trim().split(/\s+/).length : 0;
        readTimeInput.value = Math.max(1, Math.ceil(words / 200));
    });
});
</script>
@endpush
