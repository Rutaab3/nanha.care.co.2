@extends('layouts.dashboard')

@section('title', 'Manage FAQs')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Manage FAQs</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createFaqModal">
        <i class="bi bi-plus-lg me-1"></i> Add FAQ
    </button>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="faqTable">
                <thead class="table-light">
                    <tr>
                        <th style="width: 40px;"><i class="bi bi-grip-vertical text-muted"></i></th>
                        <th>Question</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th style="width: 160px;">Actions</th>
                    </tr>
                </thead>
                <tbody id="faqSortable">
                    @forelse($faqs as $faq)
                        <tr data-id="{{ $faq->id }}">
                            <td class="handle" style="cursor: grab;">
                                <i class="bi bi-grip-vertical text-muted"></i>
                            </td>
                            <td class="fw-semibold">{{ Str::limit($faq->question, 60) }}</td>
                            <td><span class="badge bg-light text-dark">{{ $faq->category }}</span></td>
                            <td>
                                <span class="badge bg-{{ $faq->status->value === 'published' ? 'success' : 'secondary' }}">
                                    {{ $faq->status->label() }}
                                </span>
                            </td>
                            <td>{{ $faq->order_index }}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-info edit-faq-btn"
                                    data-id="{{ $faq->id }}"
                                    data-question="{{ $faq->question }}"
                                    data-answer="{{ $faq->answer }}"
                                    data-category="{{ $faq->category }}"
                                    data-status="{{ $faq->status->value }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" data-confirm-form="deleteFaqForm-{{ $faq->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <form id="deleteFaqForm-{{ $faq->id }}" method="POST" action="{{ route('support.faqs.destroy', $faq->id) }}" class="d-inline">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No FAQs yet. Click "Add FAQ" to create one.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="createFaqModal" tabindex="-1" aria-labelledby="createFaqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="{{ route('support.faqs.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createFaqModalLabel">Add FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="question" class="form-label">Question <span class="text-danger">*</span></label>
                        <input type="text" name="question" id="question" class="form-control" required maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer <span class="text-danger">*</span></label>
                        <textarea name="answer" id="answer" rows="4" class="form-control" required></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                            <input type="text" name="category" id="category" class="form-control" required maxlength="100">
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editFaqModal" tabindex="-1" aria-labelledby="editFaqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="" id="editFaqForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editFaqModalLabel">Edit FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_question" class="form-label">Question <span class="text-danger">*</span></label>
                        <input type="text" name="question" id="edit_question" class="form-control" required maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label for="edit_answer" class="form-label">Answer <span class="text-danger">*</span></label>
                        <textarea name="answer" id="edit_answer" rows="4" class="form-control" required></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="edit_category" class="form-label">Category <span class="text-danger">*</span></label>
                            <input type="text" name="category" id="edit_category" class="form-control" required maxlength="100">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" id="edit_status" class="form-select" required>
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/Sortable.min.js') }}"></script>
<script>
    var faqSortable = document.getElementById('faqSortable');
    if (faqSortable) {
        new Sortable(faqSortable, {
            handle: '.handle',
            animation: 150,
            onEnd: function() {
                var ids = [];
                faqSortable.querySelectorAll('tr[data-id]').forEach(function(row) {
                    ids.push(parseInt(row.getAttribute('data-id')));
                });
                fetch('{{ route('support.faqs.reorder') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ ids: ids })
                });
            }
        });
    }

    document.querySelectorAll('.edit-faq-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            document.getElementById('edit_question').value = this.getAttribute('data-question');
            document.getElementById('edit_answer').value = this.getAttribute('data-answer');
            document.getElementById('edit_category').value = this.getAttribute('data-category');
            document.getElementById('edit_status').value = this.getAttribute('data-status');
            document.getElementById('editFaqForm').action = '{{ url('/dashboard/support/faqs') }}/' + id;
            new bootstrap.Modal(document.getElementById('editFaqModal')).show();
        });
    });
</script>
@endpush
