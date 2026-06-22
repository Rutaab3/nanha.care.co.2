@extends('layouts.dashboard')

@section('title', 'Manage Roles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Manage Roles</h2>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom-0 pt-3">
        <h5 class="fw-bold mb-0">Assign Role</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.roles.assign') }}" class="row g-2 align-items-end">
            @csrf
            <div class="col-md-5">
                <label class="form-label">User</label>
                <input type="text" id="userSearch" class="form-control mb-1" placeholder="Type to search users...">
                <select name="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                    <option value="">Select a user...</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">New Role</label>
                <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                    <option value="">Select role...</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" @selected(old('role') === $role->name)>
                            {{ ucfirst(str_replace('_', ' ', $role->name)) }}
                        </option>
                    @endforeach
                </select>
                @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-check-lg"></i> Assign
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm mt-4">
    <div class="card-header bg-white border-bottom-0 pt-3">
        <h5 class="fw-bold mb-0">Available Roles</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Role</th>
                        <th>Users</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>
                                <span class="badge fs-6" style="background-color: var(--mint-green); color: var(--dark-text);">
                                    {{ ucfirst(str_replace('_', ' ', $role->name)) }}
                                </span>
                            </td>
                            <td>{{ $role->users_count ?? $role->users()->count() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted py-4">No roles defined.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('userSearch');
        const userSelect = document.querySelector('select[name="user_id"]');
        if (searchInput && userSelect) {
            searchInput.addEventListener('input', function() {
                const filter = this.value.toLowerCase();
                for (const option of userSelect.options) {
                    if (option.value === '') continue;
                    option.style.display = option.text.toLowerCase().includes(filter) ? '' : 'none';
                }
            });
        }
    });
</script>
@endpush
