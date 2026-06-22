@props(['route', 'label', 'icon', 'current'])

@php
    $active = str_starts_with($current, $route);
@endphp

<li class="mb-1">
    <a href="{{ route($route) }}"
       class="d-flex align-items-center gap-2 px-3 py-2 rounded text-decoration-none text-on-gradient"
       style="{{ $active ? 'background-color: rgba(255,255,255,0.15); font-weight: 600;' : 'background-color: transparent;' }}"
       onmouseover="this.style.backgroundColor='rgba(255,255,255,0.12)';"
       onmouseout="this.style.backgroundColor='{{ $active ? 'rgba(255,255,255,0.15)' : 'transparent' }}';">
        <i class="bi bi-{{ $icon }}"></i>
        <span>{{ $label }}</span>
    </a>
</li>
