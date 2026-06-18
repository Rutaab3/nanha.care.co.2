@extends('layouts.app')

@section('title', 'Training Program')

@section('content')

<section style="background: linear-gradient(135deg, var(--sky-blue), var(--mint-green));" class="py-5">
    <div class="container text-center text-white py-4">
        <h1 class="fw-bold display-5 mb-3">Babysitter Training Program</h1>
        <p class="lead mb-0" style="color: rgba(255,255,255,0.9);">Become a certified babysitter with NanhaCare</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Program Modules</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-3">
                    <div class="card-body d-flex align-items-start gap-3">
                        <i class="bi bi-shield-check display-5 flex-shrink-0" style="color: var(--sky-blue);"></i>
                        <div>
                            <h5 class="fw-bold">Child Safety & First Aid</h5>
                            <p class="text-muted mb-0">Learn essential first aid, CPR, choking response, and home safety protocols for children of all ages.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-3">
                    <div class="card-body d-flex align-items-start gap-3">
                        <i class="bi bi-emoji-smile display-5 flex-shrink-0" style="color: var(--baby-pink);"></i>
                        <div>
                            <h5 class="fw-bold">Child Psychology Basics</h5>
                            <p class="text-muted mb-0">Understand child development stages, behavior management, and effective communication techniques.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-3">
                    <div class="card-body d-flex align-items-start gap-3">
                        <i class="bi bi-cup-hot display-5 flex-shrink-0" style="color: var(--mint-green);"></i>
                        <div>
                            <h5 class="fw-bold">Nutrition & Meal Prep</h5>
                            <p class="text-muted mb-0">Learn age-appropriate nutrition, meal planning, and safe food handling for children.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-3">
                    <div class="card-body d-flex align-items-start gap-3">
                        <i class="bi bi-telephone display-5 flex-shrink-0" style="color: var(--sunshine-yellow);"></i>
                        <div>
                            <h5 class="fw-bold">Emergency Response</h5>
                            <p class="text-muted mb-0">Master emergency protocols, evacuation procedures, and how to handle medical crises calmly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Get Certified</h2>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 70px; height: 70px; background-color: var(--sky-blue); color: white; font-size: 1.8rem; font-weight: 700;">
                    1
                </div>
                <h5 class="fw-bold">Complete Training</h5>
                <p class="text-muted">Finish all four program modules with passing assessments.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 70px; height: 70px; background-color: var(--mint-green); color: white; font-size: 1.8rem; font-weight: 700;">
                    2
                </div>
                <h5 class="fw-bold">Pass the Exam</h5>
                <p class="text-muted">Take our comprehensive certification exam and score 80% or above.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 70px; height: 70px; background-color: var(--baby-pink); color: white; font-size: 1.8rem; font-weight: 700;">
                    3
                </div>
                <h5 class="fw-bold">Receive Certificate</h5>
                <p class="text-muted">Get your NanhaCare Certified Babysitter badge and profile boost.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Ready to Get Started?</h2>
        <p class="text-muted mb-4">Join hundreds of certified babysitters across Pakistan.</p>
        <a href="{{ route('auth.register') }}" class="btn btn-lg px-5" style="background-color: var(--baby-pink); color: var(--dark-text); font-weight: 600;">Start Your Training Today</a>
    </div>
</section>

@endsection
