@props(['route', 'label', 'icon', 'current'])

@php
    $active = str_starts_with($current, $route);
@endphp

<li class="mb-1">
    <a href="{{ route($route) }}"
       class="d-flex align-items-center gap-2 px-3 py-2 rounded text-decoration-none"
       style="{{ $active ? 'background-color: rgba(255,255,255,0.25); color: var(--navy); font-weight: 600;' : 'color: var(--navy);' }}"
       onmouseover="this.style.backgroundColor='{{ $active ? 'rgba(58,90,124,0.15)' : 'rgba(58,90,124,0.08)' }}'; this.style.color='var(--navy)';"
       onmouseout="this.style.backgroundColor='{{ $active ? 'rgba(58,90,124,0.15)' : 'transparent' }}'; this.style.color='var(--navy)';">
        <i class="bi bi-{{ $icon }}"></i>
        <span>{{ $label }}</span>
    </a>
</li>
