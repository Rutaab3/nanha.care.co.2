@extends('layouts.dashboard')

@section('title', 'Manage Users')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Manage Users</h2>
    <a href="{{ route('admin.users.create') }}" class="btn text-white" style="background-color: var(--sky-blue);">
        <i class="bi bi-person-plus"></i> Create User
    </a>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.users.index') }}" class="row g-2 align-items-end">
            <div class="col-md-4">
                <label class="form-label small">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Name or email..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label small">Role</label>
                <select name="role" class="form-select">
                    <option value="">All Roles</option>
                    <option value="admin" @selected(request('role') === 'admin')>Admin</option>
                    <option value="moderator" @selected(request('role') === 'moderator')>Moderator</option>
                    <option value="parent" @selected(request('role') === 'parent')>Parent</option>
                    <option value="babysitter" @selected(request('role') === 'babysitter')>Babysitter</option>
                    <option value="shop_owner" @selected(request('role') === 'shop_owner')>Shop Owner</option>
                    <option value="doctor" @selected(request('role') === 'doctor')>Doctor</option>
                    <option value="support" @selected(request('role') === 'support')>Support</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small">Status</label>
                <select name="status" class="form-select">
                    <option value="">All</option>
                    <option value="active" @selected(request('status') === 'active')>Active</option>
                    <option value="suspended" @selected(request('status') === 'suspended')>Suspended</option>
                    <option value="banned" @selected(request('status') === 'banned')>Banned</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small">City</label>
                <input type="text" name="city" class="form-control" placeholder="City..." value="{{ request('city') }}">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn w-100 text-white" style="background-color: var(--sky-blue);">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>City</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=87CEEB&color=2D3436' }}" alt="{{ $user->name }}" class="rounded-circle" width="32" height="32">
                                    <span class="fw-semibold">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge" style="background-color: var(--mint-green); color: var(--dark-text);">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $user->city ?? '—' }}</td>
                            <td>
                                @php
                                    $statusColors = ['active' => 'var(--mint-green)', 'suspended' => 'var(--sunshine-yellow)', 'banned' => 'var(--baby-pink)'];
                                @endphp
                                <span class="badge" style="background-color: {{ $statusColors[$user->status->value] ?? '#ccc' }}; color: var(--dark-text);">
                                    {{ ucfirst($user->status->value) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.users.details', $user->id) }}" class="btn btn-sm btn-outline-secondary" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @if($user->status->value === 'active')
                                        <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#suspendModal{{ $user->id }}" title="Suspend">
                                            <i class="bi bi-pause-circle"></i>
                                        </button>
                                    @elseif($user->status->value === 'suspended' || $user->status->value === 'banned')
                                        <form method="POST" action="{{ route('admin.users.restore', $user->id) }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success" title="Restore">
                                                <i class="bi bi-arrow-counterclockwise"></i>
                                            </button>
                                        </form>
                                    @endif
                                    @if($user->status->value !== 'banned')
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#banModal{{ $user->id }}" title="Ban">
                                            <i class="bi bi-slash-circle"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        @if($user->status->value === 'active')
                        <div class="modal fade" id="suspendModal{{ $user->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('admin.users.suspend', $user->id) }}" class="modal-content">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Suspend User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to suspend <strong>{{ $user->name }}</strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-warning">Suspend</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif

                        <div class="modal fade" id="banModal{{ $user->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('admin.users.ban', $user->id) }}" class="modal-content">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ban User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to ban <strong>{{ $user->name }}</strong>?</p>
                                        <div class="mb-3">
                                            <label class="form-label">Reason</label>
                                            <textarea name="reason" class="form-control" rows="2" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Duration (days)</label>
                                            <input type="number" name="duration_days" class="form-control" min="1" placeholder="Leave blank for permanent">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Ban</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($users->hasPages())
        <div class="card-footer bg-white">
            {{ $users->links() }}
        </div>
    @endif
</div>
@endsection
