@extends('layouts.dashboard')

@section('title', 'Moderator Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Moderator Dashboard</h2>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        @include('components.stats-card', ['icon' => 'file-text', 'value' => $pending_blog_posts, 'label' => 'Pending Blog Posts', 'color' => 'var(--sky-blue)'])
    </div>
    <div class="col-md-4">
        @include('components.stats-card', ['icon' => 'box', 'value' => $pending_products, 'label' => 'Pending Products', 'color' => 'var(--sunshine-yellow)'])
    </div>
    <div class="col-md-4">
        @include('components.stats-card', ['icon' => 'person-badge', 'value' => $pending_reviews, 'label' => 'Pending Profile Reviews', 'color' => 'var(--baby-pink)'])
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom-0 pt-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Recent Flagged Items</h5>
                <a href="{{ route('moderator.flagged.index') }}" class="btn btn-sm text-white" style="background-color: var(--sky-blue);">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Item</th>
                                <th>Reason</th>
                                <th>Reporter</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($flagged_items as $flagged)
                                <tr>
                                    <td>{{ class_basename($flagged->flaggable_type) }} #{{ $flagged->flaggable_id }}</td>
                                    <td>{{ Str::limit($flagged->reason, 40) }}</td>
                                    <td>{{ $flagged->reporter?->name ?? 'Unknown' }}</td>
                                    <td class="text-muted small">{{ $flagged->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">No flagged items.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom-0 pt-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Recent User Reports</h5>
                <a href="{{ route('moderator.reports.index') }}" class="btn btn-sm text-white" style="background-color: var(--sky-blue);">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Reporter</th>
                                <th>Subject</th>
                                <th>Reason</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($user_reports as $report)
                                <tr>
                                    <td>{{ $report->reporter?->name ?? 'Unknown' }}</td>
                                    <td>{{ $report->subject?->name ?? 'Unknown' }}</td>
                                    <td>{{ Str::limit($report->reason, 40) }}</td>
                                    <td class="text-muted small">{{ $report->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">No user reports.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
