@props(['route', 'label', 'icon', 'current'])

@php
    $active = str_starts_with($current, $route);
@endphp

<li class="mb-1">
    <a href="{{ route($route) }}"
       class="d-flex align-items-center gap-2 px-3 py-2 rounded text-decoration-none"
       style="{{ $active ? 'background-color: var(--sky-blue); color: var(--dark-text); font-weight: 600;' : 'color: #ccc;' }}"
       onmouseover="this.style.backgroundColor='{{ $active ? 'var(--sky-blue)' : '#444' }}'; this.style.color='{{ $active ? 'var(--dark-text)' : '#fff' }}';"
       onmouseout="this.style.backgroundColor='{{ $active ? 'var(--sky-blue)' : 'transparent' }}'; this.style.color='{{ $active ? 'var(--dark-text)' : '#ccc' }}';">
        <i class="bi bi-{{ $icon }}"></i>
        <span>{{ $label }}</span>
    </a>
</li>
