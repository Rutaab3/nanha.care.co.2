@extends('layouts.app')

@section('title', 'Pricing')

@section('content')

<section style="background: linear-gradient(135deg, var(--sky-blue), var(--mint-green));" class="py-5">
    <div class="container text-center text-white py-4">
        <h1 class="fw-bold display-5 mb-3">Simple, Transparent Pricing</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <h5 class="fw-bold mb-1">Free</h5>
                        <p class="display-5 fw-bold mb-3" style="color: var(--dark-text);">PKR 0<small class="fs-6 text-muted">/month</small></p>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="bi bi-check-lg me-2" style="color: var(--mint-green);"></i>Basic listing</li>
                            <li class="mb-2"><i class="bi bi-check-lg me-2" style="color: var(--mint-green);"></i>1 booking/month</li>
                        </ul>
                        <a href="{{ route('auth.register') }}" class="btn w-100" style="background-color: var(--sky-blue); color: white;">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <h5 class="fw-bold mb-1">Standard</h5>
                        <p class="display-5 fw-bold mb-3" style="color: var(--dark-text);">PKR 499<small class="fs-6 text-muted">/month</small></p>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="bi bi-check-lg me-2" style="color: var(--mint-green);"></i>Featured listing</li>
                            <li class="mb-2"><i class="bi bi-check-lg me-2" style="color: var(--mint-green);"></i>10 bookings/month</li>
                            <li class="mb-2"><i class="bi bi-check-lg me-2" style="color: var(--mint-green);"></i>Priority support</li>
                        </ul>
                        <a href="{{ route('auth.register') }}" class="btn w-100" style="background-color: var(--sky-blue); color: white;">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow" style="border: 2px solid var(--sky-blue) !important;">
                    <div class="card-body text-center p-4">
                        <span class="badge mb-2" style="background-color: var(--sky-blue); color: white;">Most Popular</span>
                        <h5 class="fw-bold mb-1">Premium</h5>
                        <p class="display-5 fw-bold mb-3" style="color: var(--dark-text);">PKR 999<small class="fs-6 text-muted">/month</small></p>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="bi bi-check-lg me-2" style="color: var(--mint-green);"></i>Top listing</li>
                            <li class="mb-2"><i class="bi bi-check-lg me-2" style="color: var(--mint-green);"></i>Unlimited bookings</li>
                            <li class="mb-2"><i class="bi bi-check-lg me-2" style="color: var(--mint-green);"></i>24/7 support</li>
                        </ul>
                        <a href="{{ route('auth.register') }}" class="btn w-100" style="background-color: var(--baby-pink); color: var(--dark-text); font-weight: 600;">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Frequently Asked Questions</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="pricingFaq">
                    <div class="accordion-item border-0 shadow-sm mb-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false">
                                How does billing work?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#pricingFaq">
                            <div class="accordion-body text-muted">Billing is monthly and can be paid via Easypaisa, JazzCash, or bank transfer. You can upgrade, downgrade, or cancel anytime.</div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 shadow-sm mb-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
                                Can I switch plans later?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#pricingFaq">
                            <div class="accordion-body text-muted">Yes, you can upgrade or downgrade your plan at any time. Changes take effect from the next billing cycle.</div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 shadow-sm mb-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
                                Is there a cancellation fee?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#pricingFaq">
                            <div class="accordion-body text-muted">No cancellation fees. You can cancel your subscription anytime with no additional charges.</div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false">
                                What payment methods do you accept?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#pricingFaq">
                            <div class="accordion-body text-muted">We accept Easypaisa, JazzCash, bank transfers, and major debit/credit cards through our secure payment gateway.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
