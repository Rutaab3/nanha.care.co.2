<footer>
    <div style="background: linear-gradient(13deg, var(--sky-blue), var(--baby-pink)); padding: 12px 0; color: var(--navy);">
        <div class="container text-center">
            <strong><i class="bi bi-telephone-fill me-2"></i>Emergency: Need a babysitter urgently?</strong>
            <a href="tel:+921234567890" class="ms-2 fw-bold" style="color: var(--navy); text-decoration: underline;">+92 123 4567890</a>
        </div>
    </div>
    <div style="background: linear-gradient(13deg, var(--sky-blue), var(--baby-pink)); color: var(--navy); padding: 40px 0 20px;">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3">
                    <h5 class="mb-3" style="color: var(--navy); font-weight: 700;">About NanhaCare</h5>
                    <p style="font-size: 0.9rem; color: var(--navy);">NanhaCare connects trusted babysitters with families. We ensure safe, reliable, and affordable childcare for your little ones.</p>
                </div>
                <div class="col-md-3">
                    <h5 class="mb-3" style="color: var(--navy); font-weight: 700;">Quick Links</h5>
                    <ul class="list-unstyled" style="font-size: 0.9rem;">
                        <li class="mb-2"><a href="{{ route('home') }}" class="text-decoration-none" style="color: var(--navy);">Home</a></li>
                        <li class="mb-2"><a href="{{ route('babysitters.index') }}" class="text-decoration-none" style="color: var(--navy);">Babysitters</a></li>
                        <li class="mb-2"><a href="{{ route('marketplace.index') }}" class="text-decoration-none" style="color: var(--navy);">Marketplace</a></li>
                        <li class="mb-2"><a href="{{ route('blog.index') }}" class="text-decoration-none" style="color: var(--navy);">Blog</a></li>
                        <li class="mb-2"><a href="{{ route('contact.index') }}" class="text-decoration-none" style="color: var(--navy);">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="mb-3" style="color: var(--navy); font-weight: 700;">Baby Products</h5>
                    <ul class="list-unstyled" style="font-size: 0.9rem;">
                        <li class="mb-2"><a href="{{ route('marketplace.index') }}?category=diapers" class="text-decoration-none" style="color: var(--navy);">Diapers</a></li>
                        <li class="mb-2"><a href="{{ route('marketplace.index') }}?category=formula" class="text-decoration-none" style="color: var(--navy);">Baby Formula</a></li>
                        <li class="mb-2"><a href="{{ route('marketplace.index') }}?category=toys" class="text-decoration-none" style="color: var(--navy);">Toys</a></li>
                        <li class="mb-2"><a href="{{ route('marketplace.index') }}?category=clothing" class="text-decoration-none" style="color: var(--navy);">Clothing</a></li>
                        <li class="mb-2"><a href="{{ route('marketplace.index') }}?category=gear" class="text-decoration-none" style="color: var(--navy);">Baby Gear</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="mb-3" style="color: var(--navy); font-weight: 700;">Connect</h5>
                    <div class="d-flex gap-3 mb-3">
                        <a href="#" style="color: var(--navy); font-size: 1.3rem;"><i class="bi bi-facebook"></i></a>
                        <a href="#" style="color: var(--navy); font-size: 1.3rem;"><i class="bi bi-instagram"></i></a>
                        <a href="#" style="color: var(--navy); font-size: 1.3rem;"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" style="color: var(--navy); font-size: 1.3rem;"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    <p style="font-size: 0.9rem; color: var(--navy);">Email: <a href="mailto:support@nanhacare.com" class="text-decoration-none" style="color: var(--navy); font-weight: 600;">support@nanhacare.com</a></p>
                </div>
            </div>
            <hr style="border-color: rgba(58,90,124,0.2);">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0" style="font-size: 0.85rem; color: var(--navy);">&copy; {{ date('Y') }} NanhaCare. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-decoration-none me-3" style="color: var(--navy); font-size: 0.85rem;">Terms</a>
                    <a href="#" class="text-decoration-none me-3" style="color: var(--navy); font-size: 0.85rem;">Privacy</a>
                    <a href="#" class="text-decoration-none" style="color: var(--navy); font-size: 0.85rem;">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</footer>
