@extends('layouts.dashboard')

@section('title', 'My Children')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0">My Children</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addChildModal">
            <i class="bi bi-plus-circle"></i> Add Child
        </button>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Allergies</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($children as $child)
                        <tr>
                            <td class="fw-semibold">{{ $child->name }}</td>
                            <td class="child-age" data-dob="{{ $child->dob->format('Y-m-d') }}"></td>
                            <td>{{ ucfirst($child->gender) }}</td>
                            <td>
                                @if($child->allergies)
                                    @foreach($child->allergies as $allergy)
                                        <span class="badge rounded-pill bg-warning text-dark me-1">{{ $allergy }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">None</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editChildModal{{ $child->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-confirm-form="delete-child-{{ $child->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <form method="POST" action="{{ route('parent.children.destroy', $child->id) }}" id="delete-child-{{ $child->id }}" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-people fs-1 d-block mb-2"></i>
                                No children added yet. Click "Add Child" to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Add Child Modal --}}
    <div class="modal fade" id="addChildModal" tabindex="-1" aria-labelledby="addChildModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('parent.children.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addChildModalLabel">Add Child</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if($errors->any())
                            <div class="alert alert-danger py-2">
                                <ul class="mb-0 small">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" required>
                            @error('dob') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                <option value="">Select gender</option>
                                <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="allergies" class="form-label">Allergies</label>
                            <input type="text" name="allergies" id="allergies" class="form-control @error('allergies') is-invalid @enderror" value="{{ old('allergies') }}" placeholder="e.g. peanuts, dairy, eggs">
                            @error('allergies') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <div class="form-text">Separate multiple allergies with commas.</div>
                        </div>
                        <div class="mb-3">
                            <label for="special_needs" class="form-label">Special Needs</label>
                            <textarea name="special_needs" id="special_needs" class="form-control @error('special_needs') is-invalid @enderror" rows="3" placeholder="Any special needs or medical conditions...">{{ old('special_needs') }}</textarea>
                            @error('special_needs') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Child</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Edit Child Modals --}}
    @foreach($children as $child)
        <div class="modal fade" id="editChildModal{{ $child->id }}" tabindex="-1" aria-labelledby="editChildModalLabel{{ $child->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('parent.children.update', $child->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editChildModalLabel{{ $child->id }}">Edit Child</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit_name_{{ $child->id }}" class="form-label">Name</label>
                                <input type="text" name="name" id="edit_name_{{ $child->id }}" class="form-control" value="{{ $child->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_dob_{{ $child->id }}" class="form-label">Date of Birth</label>
                                <input type="date" name="dob" id="edit_dob_{{ $child->id }}" class="form-control" value="{{ $child->dob->format('Y-m-d') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_gender_{{ $child->id }}" class="form-label">Gender</label>
                                <select name="gender" id="edit_gender_{{ $child->id }}" class="form-select" required>
                                    <option value="">Select gender</option>
                                    <option value="male" {{ $child->gender === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $child->gender === 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $child->gender === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit_allergies_{{ $child->id }}" class="form-label">Allergies</label>
                                <input type="text" name="allergies" id="edit_allergies_{{ $child->id }}" class="form-control" value="{{ is_array($child->allergies) ? implode(', ', $child->allergies) : $child->allergies }}" placeholder="e.g. peanuts, dairy, eggs">
                                <div class="form-text">Separate multiple allergies with commas.</div>
                            </div>
                            <div class="mb-3">
                                <label for="edit_special_needs_{{ $child->id }}" class="form-label">Special Needs</label>
                                <textarea name="special_needs" id="edit_special_needs_{{ $child->id }}" class="form-control" rows="3" placeholder="Any special needs or medical conditions...">{{ $child->special_needs }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Child</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.child-age').forEach(function(el) {
            var dob = el.getAttribute('data-dob');
            if (dob) {
                var age = new Date().getFullYear() - new Date(dob).getFullYear();
                el.textContent = age;
            }
        });

        @if($errors->any())
            var addModal = new bootstrap.Modal('#addChildModal');
            addModal.show();
        @endif
    });
</script>
@endpush
