@extends('layouts.dashboard')

@section('title', 'My Profile')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0">My Profile</h4>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-3">Profile Completion</h5>
            <div class="progress" style="height: 24px;">
                <div class="progress-bar" role="progressbar" style="width: {{ $completion }}%; background-color: var(--mint-green);"
                     aria-valuenow="{{ $completion }}" aria-valuemin="0" aria-valuemax="100">
                    {{ $completion }}%
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('babysitter.profile.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea name="bio" id="bio" class="form-control" rows="4" required>{{ old('bio', $profile->bio ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="hourly_rate" class="form-label">Hourly Rate ($)</label>
                        <input type="number" name="hourly_rate" id="hourly_rate" class="form-control" step="0.01" min="0"
                               value="{{ old('hourly_rate', $profile->hourly_rate ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="experience_years" class="form-label">Experience (Years)</label>
                        <input type="number" name="experience_years" id="experience_years" class="form-control" min="0"
                               value="{{ old('experience_years', $profile->experience_years ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="specializations" class="form-label">Specializations</label>
                        <select name="specializations[]" id="specializations" class="form-select" multiple required>
                            @php
                                $options = ['Infant Care', 'Toddler Care', 'First Aid', 'Special Needs', 'Homework Help', 'Cooking', 'Pet Care'];
                                $selected = old('specializations', $profile->specializations ?? []);
                            @endphp
                            @foreach($options as $option)
                                <option value="{{ $option }}" {{ in_array($option, $selected) ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="avatar" class="form-label">Profile Photo</label>
                        <input type="file" name="avatar" id="avatar" class="form-control" accept="image/*">
                        @if($profile?->avatar)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $profile->avatar) }}" alt="Avatar" class="rounded-circle" style="width: 64px; height: 64px; object-fit: cover;">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="certifications" class="form-label">Certifications (Optional)</label>
                        <input type="file" name="certifications[]" id="certifications" class="form-control" multiple accept=".pdf,.jpg,.png">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Update Profile</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    new Choices('#specializations', { removeItemButton: true });
</script>
@endpush
