@extends('layouts.dashboard')

@section('title', 'Review Booking')

@section('content')
    <div class="mb-3">
        <a href="{{ route('parent.bookings.index') }}" class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left"></i> Back to Bookings
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Review Your Booking</h5>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <p class="mb-1"><strong>Babysitter:</strong> {{ $booking->babysitter->name ?? 'N/A' }}</p>
                <p class="mb-1"><strong>Date:</strong> {{ $booking->date->format('M d, Y') }}</p>
                <p class="mb-0"><strong>Duration:</strong> {{ $booking->duration_hours }} hours</p>
            </div>

            <form method="POST" action="{{ route('parent.bookings.review', $booking->id) }}">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-semibold">Rating</label>
                    <div class="star-input d-flex gap-2 fs-3" style="cursor: pointer; color: var(--sunshine-yellow);">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star" data-value="{{ $i }}" role="button"></i>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating" value="0" required>
                    @error('rating') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="comment" class="form-label fw-semibold">Comment</label>
                    <textarea name="comment" id="comment" class="form-control" rows="4" placeholder="Share your experience..." required></textarea>
                    @error('comment') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var stars = document.querySelectorAll('.star-input .bi-star, .star-input .bi-star-fill');
        var ratingInput = document.getElementById('rating');

        stars.forEach(function(star) {
            star.addEventListener('click', function() {
                var value = parseInt(this.getAttribute('data-value'));
                ratingInput.value = value;

                stars.forEach(function(s, index) {
                    var starValue = parseInt(s.getAttribute('data-value'));
                    if (starValue <= value) {
                        s.className = 'bi bi-star-fill';
                    } else {
                        s.className = 'bi bi-star';
                    }
                });
            });

            star.addEventListener('mouseenter', function() {
                var value = parseInt(this.getAttribute('data-value'));
                stars.forEach(function(s, index) {
                    var starValue = parseInt(s.getAttribute('data-value'));
                    if (starValue <= value) {
                        s.className = 'bi bi-star-fill';
                    }
                });
            });

            star.addEventListener('mouseleave', function() {
                var selected = parseInt(ratingInput.value);
                stars.forEach(function(s, index) {
                    var starValue = parseInt(s.getAttribute('data-value'));
                    if (starValue <= selected) {
                        s.className = 'bi bi-star-fill';
                    } else {
                        s.className = 'bi bi-star';
                    }
                });
            });
        });
    });
</script>
@endpush
