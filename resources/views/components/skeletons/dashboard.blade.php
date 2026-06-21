<div class="skeleton-wrap">
    <div class="skeleton-title mb-4"></div>

    <div class="row g-3 mb-4">
        @for($i = 0; $i < 6; $i++)
        <div class="col-md-4 col-lg-2">
            <div class="skeleton-card p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="skeleton-circle"></div>
                    <div class="flex-grow-1">
                        <div class="skeleton-line w-50 mb-2"></div>
                        <div class="skeleton-line w-75 skeleton-line--sm"></div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>

    <div class="skeleton-card">
        <div class="p-3 border-bottom">
            <div class="skeleton-line w-25"></div>
        </div>
        <div class="p-3">
            @for($i = 0; $i < 5; $i++)
            <div class="d-flex gap-4 mb-3 align-items-center">
                <div class="skeleton-line w-25"></div>
                <div class="skeleton-line w-50"></div>
                <div class="skeleton-line w-25"></div>
                <div class="skeleton-line w-25"></div>
            </div>
            @endfor
        </div>
    </div>
</div>
