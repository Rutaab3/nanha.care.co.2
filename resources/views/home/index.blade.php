@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section style="background: linear-gradient(135deg, var(--sky-blue), var(--mint-green));" class="py-5">
    <div class="container text-center text-white py-4">
        <h1 class="fw-bold display-5 mb-3">Find Trusted & Verified Babysitters in Pakistan</h1>
        <p class="lead mb-4" style="color: rgba(255,255,255,0.9);">Safe, reliable childcare at your fingertips</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('babysitters.index') }}" class="btn btn-primary btn-lg px-4" style="background-color: var(--dark-text); border-color: var(--dark-text);">Find a Babysitter</a>
            <a href="{{ route('auth.register') }}" class="btn btn-outline-light btn-lg px-4">Become a Babysitter</a>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Why NanhaCare is Trusted</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="card-body">
                        <i class="bi bi-shield-check display-4 mb-3" style="color: var(--mint-green);"></i>
                        <h5 class="fw-bold">Triple-Verified</h5>
                        <p class="text-muted mb-0">Every babysitter passes CNIC, police clearance, and in-person interview verification.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="card-body">
                        <i class="bi bi-star display-4 mb-3" style="color: var(--sunshine-yellow);"></i>
                        <h5 class="fw-bold">Ratings & Reviews</h5>
                        <p class="text-muted mb-0">Real feedback from real families helps you choose with confidence.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="card-body">
                        <i class="bi bi-telephone display-4 mb-3" style="color: var(--baby-pink);"></i>
                        <h5 class="fw-bold">Emergency Response System</h5>
                        <p class="text-muted mb-0">24/7 emergency hotline and in-app support for immediate assistance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">How It Works</h2>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px; background-color: var(--sky-blue); color: white; font-size: 1.5rem; font-weight: 700;">
                    <i class="bi bi-search"></i>
                </div>
                <h5 class="fw-bold">Search</h5>
                <p class="text-muted">Browse verified babysitters near you with detailed profiles and reviews.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px; background-color: var(--mint-green); color: white; font-size: 1.5rem; font-weight: 700;">
                    <i class="bi bi-check2-circle"></i>
                </div>
                <h5 class="fw-bold">Verify</h5>
                <p class="text-muted">Check their ratings, background checks, and read parent reviews.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px; background-color: var(--baby-pink); color: white; font-size: 1.5rem; font-weight: 700;">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <h5 class="fw-bold">Book</h5>
                <p class="text-muted">Book instantly or schedule for later with secure online payment.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Our Verification Process</h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-3">
                    <div class="card-body">
                        <i class="bi bi-person-badge display-5 mb-3" style="color: var(--sky-blue);"></i>
                        <h6 class="fw-bold">CNIC Check</h6>
                        <p class="text-muted small mb-0">National ID verified against government records.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-3">
                    <div class="card-body">
                        <i class="bi bi-file-earmark-text display-5 mb-3" style="color: var(--mint-green);"></i>
                        <h6 class="fw-bold">Police Clearance</h6>
                        <p class="text-muted small mb-0">Official criminal record check conducted.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-3">
                    <div class="card-body">
                        <i class="bi bi-chat-dots display-5 mb-3" style="color: var(--baby-pink);"></i>
                        <h6 class="fw-bold">Interview</h6>
                        <p class="text-muted small mb-0">In-person or video interview by our team.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-3">
                    <div class="card-body">
                        <i class="bi bi-award display-5 mb-3" style="color: var(--sunshine-yellow);"></i>
                        <h6 class="fw-bold">Training & Certification</h6>
                        <p class="text-muted small mb-0">Certified in first aid, safety, and childcare.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Featured Babysitters</h2>
        <div class="overflow-x-auto pb-3">
            <div class="d-flex flex-nowrap gap-4">
                @forelse($featuredBabysitters as $b)
                    <div class="flex-shrink-0" style="width: 280px;">
                        @include('partials._babysitter-card', ['babysitter' => $b])
                    </div>
                @empty
                    <p class="text-muted text-center w-100">No featured babysitters available yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Coming Soon</h2>
        <div class="row g-4">
            <div class="col-md-4 col-6 text-center">
                <i class="bi bi-fingerprint display-5 mb-2" style="color: var(--sky-blue);"></i>
                <p class="fw-bold mb-0">Background Checks</p>
            </div>
            <div class="col-md-4 col-6 text-center">
                <i class="bi bi-file-text display-5 mb-2" style="color: var(--mint-green);"></i>
                <p class="fw-bold mb-0">Activity Reports</p>
            </div>
            <div class="col-md-4 col-6 text-center">
                <i class="bi bi-people display-5 mb-2" style="color: var(--baby-pink);"></i>
                <p class="fw-bold mb-0">Parent Community</p>
            </div>
            <div class="col-md-4 col-6 text-center">
                <i class="bi bi-geo-alt display-5 mb-2" style="color: var(--sunshine-yellow);"></i>
                <p class="fw-bold mb-0">Live GPS Tracking</p>
            </div>
            <div class="col-md-4 col-6 text-center">
                <i class="bi bi-camera-video display-5 mb-2" style="color: var(--sky-blue);"></i>
                <p class="fw-bold mb-0">Video Profiles</p>
            </div>
            <div class="col-md-4 col-6 text-center">
                <i class="bi bi-globe display-5 mb-2" style="color: var(--mint-green);"></i>
                <p class="fw-bold mb-0">Multilingual Platform</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">What Parents Say</h2>
        <div class="row g-4">
            @forelse($testimonials as $testimonial)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <i class="bi bi-chat-square-quote display-6 mb-3" style="color: var(--sky-blue); opacity: 0.5;"></i>
                            <p class="mb-3 fst-italic">"{{ $testimonial['quote'] }}"</p>
                            @include('partials._star-rating', ['rating' => $testimonial['rating']])
                            <p class="fw-bold mb-0 mt-2">{{ $testimonial['name'] }}</p>
                            <p class="text-muted small mb-0">{{ $testimonial['city'] }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center w-100">No testimonials available yet.</p>
            @endforelse
        </div>
    </div>
</section>

<section style="background-color: var(--baby-pink);" class="py-4">
    <div class="container text-center">
        <h4 class="fw-bold text-white mb-3">Need a Babysitter Right Now? Call our emergency line for immediate assistance.</h4>
        <a href="tel:+921234567890" class="btn btn-lg px-4" style="background-color: white; color: var(--baby-pink); font-weight: 700;">
            <i class="bi bi-telephone-fill me-2"></i>Call Emergency Line
        </a>
    </div>
</section>

@endsection
