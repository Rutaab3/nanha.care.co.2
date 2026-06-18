@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0" style="background-color: var(--off-white);">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold mb-1" style="color: var(--dark-text);">Register as a Doctor</h2>
                    <p class="text-muted mb-4">Join NanhaCare's healthcare network</p>

                    <form method="POST" action="{{ route('onboarding.doctor') }}" enctype="multipart/form-data">
                        @csrf

                        <div id="step-indicators" class="d-flex justify-content-between mb-4">
                            <div class="text-center flex-fill">
                                <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-1" style="width: 36px; height: 36px; background-color: var(--baby-pink); color: var(--white); font-weight: 700;" id="step1-indicator">1</div>
                                <p class="small mb-0 fw-medium" id="step1-label">Personal Info</p>
                            </div>
                            <div class="text-center flex-fill">
                                <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-1" style="width: 36px; height: 36px; background-color: #dee2e6; color: #6c757d; font-weight: 700;" id="step2-indicator">2</div>
                                <p class="small mb-0 text-muted" id="step2-label">Professional Details</p>
                            </div>
                        </div>

                        <div class="progress mb-4" style="height: 6px;">
                            <div class="progress-bar" id="progress-bar" role="progressbar" style="width: 50%; background-color: var(--baby-pink);" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div id="step-1">
                            <h5 class="fw-semibold mb-3" style="color: var(--dark-text);">Step 1: Personal Information</h5>

                            <div class="mb-3">
                                <label for="full_name" class="form-label fw-medium">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" required>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-medium">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label fw-medium">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="city" class="form-label fw-medium">City</label>
                                <select class="form-select" id="city" name="city" required>
                                    <option value="" disabled selected>Select city</option>
                                    <option value="Karachi">Karachi</option>
                                    <option value="Lahore">Lahore</option>
                                    <option value="Islamabad">Islamabad</option>
                                    <option value="Rawalpindi">Rawalpindi</option>
                                    <option value="Faisalabad">Faisalabad</option>
                                    <option value="Multan">Multan</option>
                                    <option value="Peshawar">Peshawar</option>
                                    <option value="Quetta">Quetta</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="profile_photo" class="form-label fw-medium">Profile Photo</label>
                                <input type="file" class="form-control" id="profile_photo" name="profile_photo" accept="image/*" onchange="previewImage(this, 'profile-preview')">
                                <div class="mt-2">
                                    <img id="profile-preview" src="#" alt="Preview" class="rounded" style="max-width: 150px; max-height: 150px; display: none;">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="btn px-4" id="step1-next" style="background-color: var(--baby-pink); color: var(--white); font-weight: 600;" onclick="goToStep(2)">
                                    Next <i class="bi bi-arrow-right ms-1"></i>
                                </button>
                            </div>
                        </div>

                        <div id="step-2" style="display: none;">
                            <h5 class="fw-semibold mb-3" style="color: var(--dark-text);">Step 2: Professional Details</h5>

                            <div class="mb-3">
                                <label for="pmdc_number" class="form-label fw-medium">PMDC Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="pmdc_number" name="pmdc_number" required>
                            </div>

                            <div class="mb-3">
                                <label for="specialization" class="form-label fw-medium">Specialization</label>
                                <select class="form-select" id="specialization" name="specialization" required>
                                    <option value="" disabled selected>Select specialization</option>
                                    <option value="Pediatrician">Pediatrician</option>
                                    <option value="Child Psychologist">Child Psychologist</option>
                                    <option value="Nutritionist">Nutritionist</option>
                                    <option value="General Physician">General Physician</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="clinic_name" class="form-label fw-medium">Clinic/Hospital Name</label>
                                    <input type="text" class="form-control" id="clinic_name" name="clinic_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="years_experience" class="form-label fw-medium">Years of Experience</label>
                                    <input type="number" class="form-control" id="years_experience" name="years_experience" min="0" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="clinic_address" class="form-label fw-medium">Clinic Address</label>
                                <textarea class="form-control" id="clinic_address" name="clinic_address" rows="2"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="medical_license" class="form-label fw-medium">Medical License</label>
                                <input type="file" class="form-control" id="medical_license" name="medical_license" accept="image/*,.pdf" onchange="previewImage(this, 'license-preview')">
                                <div class="mt-2">
                                    <img id="license-preview" src="#" alt="Preview" class="rounded" style="max-width: 150px; max-height: 150px; display: none;">
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="pmdc_cert" class="form-label fw-medium">PMDC Certificate</label>
                                    <input type="file" class="form-control" id="pmdc_cert" name="pmdc_cert" accept="image/*,.pdf" onchange="previewImage(this, 'pmdc-preview')">
                                    <div class="mt-2">
                                        <img id="pmdc-preview" src="#" alt="Preview" class="rounded" style="max-width: 150px; max-height: 150px; display: none;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="cv" class="form-label fw-medium">CV/Resume</label>
                                    <input type="file" class="form-control" id="cv" name="cv" accept=".pdf,.doc,.docx">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-secondary px-4" id="step2-prev" onclick="goToStep(1)">
                                    <i class="bi bi-arrow-left me-1"></i> Previous
                                </button>
                                <button type="submit" class="btn px-4" style="background-color: var(--baby-pink); color: var(--white); font-weight: 600;">
                                    <i class="bi bi-check-lg me-1"></i> Submit Registration
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) { preview.src = e.target.result; preview.style.display = 'block'; }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#'; preview.style.display = 'none';
    }
}

function goToStep(step) {
    document.getElementById('step-1').style.display = step === 1 ? 'block' : 'none';
    document.getElementById('step-2').style.display = step === 2 ? 'block' : 'none';
    const p1 = document.getElementById('step1-indicator'), p2 = document.getElementById('step2-indicator');
    const l1 = document.getElementById('step1-label'), l2 = document.getElementById('step2-label');
    const bar = document.getElementById('progress-bar');
    if (step === 1) {
        p1.style.backgroundColor = 'var(--baby-pink)'; p1.style.color = 'var(--white)';
        p2.style.backgroundColor = '#dee2e6'; p2.style.color = '#6c757d';
        l1.classList.remove('text-muted'); l2.classList.add('text-muted');
        bar.style.width = '50%'; bar.setAttribute('aria-valuenow', '50');
    } else {
        p1.style.backgroundColor = '#dee2e6'; p1.style.color = '#6c757d';
        p2.style.backgroundColor = 'var(--baby-pink)'; p2.style.color = 'var(--white)';
        l1.classList.add('text-muted'); l2.classList.remove('text-muted');
        bar.style.width = '100%'; bar.setAttribute('aria-valuenow', '100');
    }
}
</script>
@endpush
