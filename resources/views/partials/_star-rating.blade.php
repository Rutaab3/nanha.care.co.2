@php
    $rating = $rating ?? 0;
    $full = floor($rating);
    $half = ($rating - $full) >= 0.5 ? 1 : 0;
    $empty = 5 - $full - $half;
@endphp
<div class="star-rating d-inline-flex align-items-center gap-1 text-sunshine-yellow">
    @for($i = 0; $i < $full; $i++)
        <i class="bi bi-star-fill"></i>
    @endfor
    @if($half)
        <i class="bi bi-star-half"></i>
    @endif
    @for($i = 0; $i < $empty; $i++)
        <i class="bi bi-star"></i>
    @endfor
    <span class="ms-1 small text-muted">({{ number_format($rating, 1) }})</span>
</div>
