<div class="skeleton-wrap" style="min-height: 100vh;">
    <div class="skeleton-hero mb-5">
        <div class="skeleton-line w-75 mb-3" style="height: 48px;"></div>
        <div class="skeleton-line w-50 mb-3" style="height: 24px;"></div>
        <div class="skeleton-line w-25" style="height: 48px; border-radius: 25px;"></div>
    </div>

    <div class="row g-4">
        @for($i = 0; $i < 3; $i++)
        <div class="col-md-4">
            <div class="skeleton-card p-4 text-center">
                <div class="skeleton-circle mx-auto mb-3" style="width: 56px; height: 56px;"></div>
                <div class="skeleton-line w-50 mx-auto mb-2"></div>
                <div class="skeleton-line w-75 mx-auto skeleton-line--sm"></div>
                <div class="skeleton-line w-75 mx-auto skeleton-line--sm"></div>
            </div>
        </div>
        @endfor
    </div>
</div>
