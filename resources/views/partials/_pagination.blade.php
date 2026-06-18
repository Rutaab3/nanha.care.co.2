@if(isset($paginator) && $paginator->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $paginator->links('pagination::bootstrap-5') }}
    </div>
@endif
