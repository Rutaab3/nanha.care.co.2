<nav class="navbar navbar-expand-lg sticky-top" style="background-color: var(--white); box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}" style="color: var(--sky-blue); font-family: 'Poppins', sans-serif;">
            <i class="bi bi-heart-pulse-fill me-1" style="color: var(--baby-pink);"></i> NanhaCare
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('babysitters.*') ? 'active' : '' }}" href="{{ route('babysitters.index') }}">Babysitters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('marketplace.*') ? 'active' : '' }}" href="{{ route('marketplace.index') }}">Marketplace</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}" href="{{ route('pricing') }}">Pricing</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-2">
                @guest
                    <a href="{{ route('auth.login') }}" class="btn btn-outline-primary btn-sm px-3">Login</a>
                    <a href="{{ route('auth.register') }}" class="btn btn-primary btn-sm px-3" style="background-color: var(--sky-blue); border-color: var(--sky-blue);">Register</a>
                @else
                    <div class="dropdown">
                        <button class="btn dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: var(--off-white); border: 1px solid #e9ecef;">
                            <i class="bi bi-person-circle"></i>
                            <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                            <span class="badge rounded-pill" style="background-color: var(--mint-green); color: var(--dark-text); font-size: 0.65rem;">
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
