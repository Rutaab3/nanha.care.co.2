@extends('layouts.dashboard')

@section('title', 'My Profile')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">My Profile</h2>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm text-center">
            <div class="card-body py-4">
                @if($profile && $profile->profile_photo)
                    <img src="{{ asset('storage/' . $profile->profile_photo) }}"
                         class="rounded-circle mb-3" style="width: 140px; height: 140px; object-fit: cover;">
                @else
                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                         style="width: 140px; height: 140px; background-color: var(--sky-blue); font-size: 3rem; color: white;">
                        <i class="bi bi-person"></i>
                    </div>
                @endif
                <h5 class="fw-bold">{{ auth()->user()->name }}</h5>
                <p class="text-muted mb-1">{{ auth()->user()->email }}</p>
                @if($profile && $profile->specialization)
                    <span class="badge bg-light text-dark">{{ $profile->specialization }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('doctor.profile.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Specialization</label>
                        <input type="text" name="specialization" class="form-control @error('specialization') is-invalid @enderror"
                               value="{{ old('specialization', $profile->specialization ?? '') }}" required maxlength="255">
                        @error('specialization') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hospital / Clinic</label>
                        <input type="text" name="hospital" class="form-control @error('hospital') is-invalid @enderror"
                               value="{{ old('hospital', $profile->hospital ?? '') }}" required maxlength="255">
                        @error('hospital') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">PMDC Number</label>
                        <input type="text" name="pmdc_number" class="form-control @error('pmdc_number') is-invalid @enderror"
                               value="{{ old('pmdc_number', $profile->pmdc_number ?? '') }}" required maxlength="50">
                        @error('pmdc_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Profile Photo <small class="text-muted">(JPEG/PNG/WebP, max 3MB)</small></label>
                        <input type="file" name="profile_photo" class="form-control @error('profile_photo') is-invalid @enderror"
                               accept="image/jpeg,image/png,image/webp">
                        @error('profile_photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Update Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
