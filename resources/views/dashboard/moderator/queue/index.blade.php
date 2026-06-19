@extends('layouts.dashboard')

@section('title', 'Moderation Queue')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Moderation Queue</h2>
</div>

<ul class="nav nav-tabs mb-4">
    <li class="nav-item">
        <a class="nav-link {{ $tab === 'product' ? 'active fw-semibold' : '' }}" href="{{ route('moderator.queue.index', ['tab' => 'product']) }}">
            <i class="bi bi-box me-1"></i>Products
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $tab === 'blog_post' ? 'active fw-semibold' : '' }}" href="{{ route('moderator.queue.index', ['tab' => 'blog_post']) }}">
            <i class="bi bi-file-text me-1"></i>Blog Posts
        </a>
    </li>
</ul>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Submitted By</th>
                        <th>Date</th>
                        <th>Content Preview</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $entry)
                        @php
                            $item = $entry['item'];
                            $type = $entry['type'];
                            if ($type === 'product') {
                                $submittedBy = $item->shop?->owner?->name ?? 'Unknown';
                                $preview = Str::limit($item->name, 50);
                                $category = $item->category?->value ?? 'N/A';
                            } else {
                                $submittedBy = $item->doctor?->user?->name ?? 'Unknown';
                                $preview = Str::limit($item->title, 50);
                                $category = $item->category?->value ?? 'N/A';
                            }
                        @endphp
                        <tr>
                            <td>{{ $submittedBy }}</td>
                            <td class="text-muted small">{{ $item->created_at->format('M d, Y') }}</td>
                            <td>{{ $preview }}</td>
                            <td><span class="badge bg-light text-dark">{{ $category }}</span></td>
                            <td>
                                <span class="badge" style="background-color: var(--sunshine-yellow); color: var(--dark-text);">
                                    {{ ucfirst($item->status?->value ?? 'under_review') }}
                                </span>
                            </td>
                            <td class="text-end">
                                <form method="POST" action="{{ route('moderator.queue.approve', [$type, $item->id]) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="bi bi-check-lg"></i> Approve
                                    </button>
                                </form>

                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $type }}-{{ $item->id }}">
                                    <i class="bi bi-x-lg"></i> Reject
                                </button>

                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#reviseModal-{{ $type }}-{{ $item->id }}">
                                    <i class="bi bi-pencil"></i> Request Revision
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="rejectModal-{{ $type }}-{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('moderator.queue.reject', [$type, $item->id]) }}">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title">Reject Item</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Reason</label>
                                                <select id="reasonSelect-{{ $type }}-{{ $item->id }}" class="form-select" required onchange="document.getElementById('reasonText-{{ $type }}-{{ $item->id }}').value = this.value !== 'other' ? this.options[this.selectedIndex].text : ''">
                                                    <option value="">Select a reason...</option>
                                                    <option value="inappropriate_content">Inappropriate Content</option>
                                                    <option value="spam">Spam</option>
                                                    <option value="misleading">Misleading Information</option>
                                                    <option value="low_quality">Low Quality</option>
                                                    <option value="copyright">Copyright Violation</option>
                                                    <option value="other">Other (write below)</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Additional Details</label>
                                                <textarea id="reasonText-{{ $type }}-{{ $item->id }}" name="reason" class="form-control" rows="3" placeholder="Enter rejection reason..." required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="reviseModal-{{ $type }}-{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('moderator.queue.revise', [$type, $item->id]) }}">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title">Request Revision</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Revision Notes</label>
                                                <textarea name="note" class="form-control" rows="4" placeholder="Describe what needs to be changed..." required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-warning">Request Revision</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No items in queue.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
