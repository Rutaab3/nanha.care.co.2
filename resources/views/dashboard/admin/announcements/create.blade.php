@extends('layouts.dashboard')

@section('title', 'Create Announcement')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Create Announcement</h2>
    <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card border-0 shadow-sm" style="max-width: 700px;">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.announcements.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" required maxlength="255">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Body</label>
                <textarea name="body" class="form-control @error('body') is-invalid @enderror" rows="6" required>{{ old('body') }}</textarea>
                @error('body') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Target Roles</label>
                <div class="row g-2">
                    @php
                        $roleOptions = ['admin', 'moderator', 'parent', 'babysitter', 'shop_owner', 'doctor', 'support'];
                    @endphp
                    @foreach($roleOptions as $roleOption)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="target_roles[]"
                                       value="{{ $roleOption }}" id="role_{{ $roleOption }}"
                                       @checked(is_array(old('target_roles')) && in_array($roleOption, old('target_roles')))>
                                <label class="form-check-label" for="role_{{ $roleOption }}">
                                    {{ ucfirst(str_replace('_', ' ', $roleOption)) }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('target_roles') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Schedule Publish (optional)</label>
                <input type="datetime-local" name="publish_at" class="form-control @error('publish_at') is-invalid @enderror"
                       value="{{ old('publish_at') }}">
                @error('publish_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <div class="form-text">Leave blank to publish immediately.</div>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-send"></i> Create Announcement
            </button>
        </form>
    </div>
</div>
@endsection
