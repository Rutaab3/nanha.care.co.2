<nav class="navbar navbar-expand-lg sticky-top bg-gradient-accent text-on-gradient" style="box-shadow: 0 2px 8px rgba(0,0,0,0.10);">
    <div class="container">
        <a class="navbar-brand fw-bold text-on-gradient" href="{{ route('home') }}">
            <i class="bi bi-heart-pulse-fill me-1"></i> NanhaCare
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation" style="border-color: rgba(255,255,255,0.5);">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-on-gradient" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-on-gradient" href="{{ route('babysitters.index') }}">Babysitters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-on-gradient" href="{{ route('marketplace.index') }}">Marketplace</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-on-gradient" href="{{ route('blog.index') }}">Blog</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('cart.index') }}" class="btn position-relative btn-sm px-2 text-on-gradient" style="background: none; border: none;">
                    <i class="bi bi-cart3 fs-5"></i>
                </a>
                @guest
                    <a href="{{ route('auth.login') }}" class="btn btn-sm px-3 text-on-gradient" style="border: 1px solid rgba(255,255,255,0.6); background: transparent;">Login</a>
                    <a href="{{ route('auth.register') }}" class="btn btn-light btn-sm px-3 text-navy fw-semibold">Register</a>
                @else
                    <div class="dropdown">
                        <button class="btn dropdown-toggle d-flex align-items-center gap-2 text-on-gradient" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25);">
                            <i class="bi bi-person-circle"></i>
                            <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                            <span class="badge rounded-pill bg-navy text-on-gradient" style="font-size: 0.65rem;">
                                {{ ucfirst(str_replace('_', ' ', auth()->user()->getRoleNames()[0] ?? 'User')) }}
                            </span>
                        </button>
                        @php
                            $role = auth()->user()->getRoleNames()[0] ?? 'parent';
                            $dashboardRoute = match ($role) {
                                'admin' => 'admin.dashboard',
                                'moderator' => 'moderator.dashboard',
                                'parent' => 'parent.dashboard',
                                'babysitter' => 'babysitter.dashboard',
                                'shop_owner' => 'shop-owner.dashboard',
                                'doctor' => 'doctor.dashboard',
                                'support_agent' => 'support.dashboard',
                                default => 'parent.dashboard',
                            };
                        @endphp
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route($dashboardRoute) }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('auth.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
