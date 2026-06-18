<footer>
    <div style="background-color: #dc3545; padding: 12px 0; color: white;">
        <div class="container text-center">
            <strong><i class="bi bi-telephone-fill me-2"></i>Emergency: Need a babysitter urgently?</strong>
            <a href="tel:+921234567890" class="text-white ms-2 fw-bold" style="text-decoration: underline;">+92 123 4567890</a>
        </div>
    </div>
    <div style="background-color: var(--dark-text); color: #ccc; padding: 40px 0 20px;">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3">
                    <h5 class="text-white mb-3" style="color: var(--sky-blue) !important;">About NanhaCare</h5>
                    <p style="font-size: 0.9rem;">NanhaCare connects trusted babysitters with families. We ensure safe, reliable, and affordable childcare for your little ones.</p>
                </div>
                <div class="col-md-3">
                    <h5 class="text-white mb-3">Quick Links</h5>
                    <ul class="list-unstyled" style="font-size: 0.9rem;">
                        <li class="mb-2"><a href="{{ route('home') }}" class="text-decoration-none" style="color: #ccc;">Home</a></li>
                        <li class="mb-2"><a href="{{ route('babysitters.index') }}" class="text-decoration-none" style="color: #ccc;">Babysitters</a></li>
                        <li class="mb-2"><a href="{{ route('marketplace.index') }}" class="text-decoration-none" style="color: #ccc;">Marketplace</a></li>
                        <li class="mb-2"><a href="{{ route('blog.index') }}" class="text-decoration-none" style="color: #ccc;">Blog</a></li>
                        <li class="mb-2"><a href="{{ route('pricing') }}" class="text-decoration-none" style="color: #ccc;">Pricing</a></li>
                        <li class="mb-2"><a href="{{ route('contact.index') }}" class="text-decoration-none" style="color: #ccc;">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-white mb-3">Baby Products</h5>
                    <ul class="list-unstyled" style="font-size: 0.9rem;">
                        <li class="mb-2"><a href="{{ route('marketplace.index') }}?category=diapers" class="text-decoration-none" style="color: #ccc;">Diapers</a></li>
                        <li class="mb-2"><a href="{{ route('marketplace.index') }}?category=formula" class="text-decoration-none" style="color: #ccc;">Baby Formula</a></li>
                        <li class="mb-2"><a href="{{ route('marketplace.index') }}?category=toys" class="text-decoration-none" style="color: #ccc;">Toys</a></li>
                        <li class="mb-2"><a href="{{ route('marketplace.index') }}?category=clothing" class="text-decoration-none" style="color: #ccc;">Clothing</a></li>
                        <li class="mb-2"><a href="{{ route('marketplace.index') }}?category=gear" class="text-decoration-none" style="color: #ccc;">Baby Gear</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-white mb-3">Connect</h5>
                    <div class="d-flex gap-3 mb-3">
                        <a href="#" class="text-white fs-5"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white fs-5"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white fs-5"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-white fs-5"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    <p style="font-size: 0.9rem;">Email: <a href="mailto:support@nanhacare.com" class="text-decoration-none" style="color: var(--sky-blue);">support@nanhacare.com</a></p>
                </div>
            </div>
            <hr style="border-color: #555;">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0" style="font-size: 0.85rem;">&copy; {{ date('Y') }} NanhaCare. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-decoration-none me-3" style="color: #ccc; font-size: 0.85rem;">Terms</a>
                    <a href="#" class="text-decoration-none me-3" style="color: #ccc; font-size: 0.85rem;">Privacy</a>
                    <a href="#" class="text-decoration-none" style="color: #ccc; font-size: 0.85rem;">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</footer>
