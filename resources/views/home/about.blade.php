@extends('layouts.app')

@section('title', 'About Us')

@section('content')

<section style="background: linear-gradient(135deg, var(--sky-blue), var(--mint-green));" class="py-5">
    <div class="container text-center text-white py-4">
        <h1 class="fw-bold display-5 mb-3">About NanhaCare</h1>
        <p class="lead mb-0" style="color: rgba(255,255,255,0.9);">Pakistan's most trusted platform for finding verified babysitters</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Our Mission</h2>
                <p class="text-muted" style="line-height: 1.8;">At NanhaCare, our mission is to connect families across Pakistan with safe, reliable, and verified babysitters. We believe every child deserves the best care, and every parent deserves peace of mind. Through rigorous verification processes, transparent reviews, and a commitment to quality, we are building a community where childcare is trusted, accessible, and affordable.</p>
            </div>
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-6 text-center">
                        <div class="p-3 rounded-3" style="background-color: var(--off-white);">
                            <i class="bi bi-heart display-4" style="color: var(--baby-pink);"></i>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="p-3 rounded-3" style="background-color: var(--off-white);">
                            <i class="bi bi-shield-check display-4" style="color: var(--mint-green);"></i>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="p-3 rounded-3" style="background-color: var(--off-white);">
                            <i class="bi bi-people display-4" style="color: var(--sky-blue);"></i>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="p-3 rounded-3" style="background-color: var(--off-white);">
                            <i class="bi bi-star display-4" style="color: var(--sunshine-yellow);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-4">
                    <div class="card-body">
                        <p class="display-3 fw-bold" style="color: var(--sky-blue);">500+</p>
                        <p class="fw-bold mb-0">Verified Babysitters</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-4">
                    <div class="card-body">
                        <p class="display-3 fw-bold" style="color: var(--mint-green);">1000+</p>
                        <p class="fw-bold mb-0">Happy Families</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-4">
                    <div class="card-body">
                        <p class="display-3 fw-bold" style="color: var(--baby-pink);">50+</p>
                        <p class="fw-bold mb-0">Cities Across Pakistan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Our Values</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="card-body">
                        <i class="bi bi-shield display-4 mb-3" style="color: var(--sky-blue);"></i>
                        <h5 class="fw-bold">Trust & Safety</h5>
                        <p class="text-muted mb-0">Every babysitter is thoroughly vetted so you can feel confident in your choice.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="card-body">
                        <i class="bi bi-star display-4 mb-3" style="color: var(--sunshine-yellow);"></i>
                        <h5 class="fw-bold">Quality Care</h5>
                        <p class="text-muted mb-0">We maintain high standards through training, certification, and ongoing reviews.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="card-body">
                        <i class="bi bi-people display-4 mb-3" style="color: var(--mint-green);"></i>
                        <h5 class="fw-bold">Community</h5>
                        <p class="text-muted mb-0">We're building a supportive network of families and caregivers across Pakistan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
