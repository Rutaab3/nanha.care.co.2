@extends('layouts.dashboard')

@section('title', 'Saved Babysitters')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0">Saved Babysitters</h4>
    </div>

    @forelse($savedBabysitters as $saved)
        @php $profile = $saved->babysitterProfile; @endphp
        @if($profile && $profile->user)
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center"
                             style="width: 56px; height: 56px; background-color: var(--sky-blue); color: var(--white); font-weight: 700; font-size: 1.25rem;">
                            {{ substr($profile->user->name, 0, 1) }}
                        </div>
                        <div>
                            <h6 class="mb-1 fw-semibold">{{ $profile->user->name }}</h6>
                            <small class="text-muted">
                                ${{ number_format($profile->hourly_rate, 2) }}/hr ·
                                {{ $profile->experience_years }} yrs exp
                            </small>
                            <div class="mt-1">
                                @if($profile->specializations)
                                    @foreach(array_slice($profile->specializations, 0, 3) as $spec)
                                        <span class="badge rounded-pill bg-off-white text-dark me-1" style="border: 1px solid #dee2e6;">{{ $spec }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('babysitters.profile', $profile->user_id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-person"></i> View
                        </a>
                        <form method="POST" action="{{ route('parent.saved-babysitters.remove', $profile->user_id) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this babysitter from your saved list?')">
                                <i class="bi bi-heartbreak"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @empty
        <div class="text-center py-5 text-muted">
            <i class="bi bi-bookmark-heart fs-1 d-block mb-2"></i>
            <p>No saved babysitters yet. Browse babysitters and save your favourites!</p>
            <a href="{{ route('babysitters.index') }}" class="btn btn-primary">Browse Babysitters</a>
        </div>
    @endforelse
@endsection
