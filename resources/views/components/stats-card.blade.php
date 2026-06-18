<div class="card border-0 shadow-sm h-100">
    <div class="card-body d-flex align-items-center gap-3">
        <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0"
             style="width: 56px; height: 56px; background-color: {{ $color ?? 'var(--sky-blue)' }};">
            <i class="bi bi-{{ $icon }}" style="font-size: 1.5rem; color: var(--white);"></i>
        </div>
        <div>
            <p class="fw-bold fs-4 mb-0">{{ $value }}</p>
            <p class="text-muted small mb-0">{{ $label }}</p>
        </div>
    </div>
</div>
