<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - NanhaCare</title>
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/notifications.css') }}" rel="stylesheet">
    @stack('styles')
    <style>
        :root {
            --sky-blue: #7EB8DA;
            --baby-pink: #F8B1C8;
            --mint-green: #C6F3D3;
            --off-white: #FFF9F2;
            --sunshine-yellow: #FFE97F;
            --slate-grey: #AAAAAA;
            --dark-text: #555555;
            --white: #FFFFFF;
            --navy: #3A5A7C;
        }
        body {
            font-family: 'Nunito', sans-serif;
            color: var(--dark-text);
            background-color: var(--off-white);
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }
        .dashboard-body {
            display: flex;
            min-height: 100vh;
        }
        .main-content {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
        }
        .topbar {
            background: var(--white);
            padding: 12px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e9ecef;
            position: sticky;
            top: 0;
            z-index: 1020;
        }
        .content-area {
            flex: 1;
            padding: 24px;
        }
        @media (max-width: 991.98px) {
            .main-content {
                margin-left: 0;
            }
        }
        .text-sky-blue { color: var(--sky-blue); }
        .text-baby-pink { color: var(--baby-pink); }
        .text-mint-green { color: var(--mint-green); }
        .text-sunshine-yellow { color: var(--sunshine-yellow); }
        .text-slate-grey { color: var(--slate-grey); }
        .bg-sky-blue { background-color: var(--sky-blue); }
        .bg-baby-pink { background-color: var(--baby-pink); }
        .bg-mint-green { background-color: var(--mint-green); }
        .bg-off-white { background-color: var(--off-white); }
        .bg-sunshine-yellow { background-color: var(--sunshine-yellow); }
        .bg-slate-grey { background-color: var(--slate-grey); }
    </style>
</head>
<body class="dashboard-body">
    @include('components.sidebar-menu')

    <div class="main-content">
        <div class="topbar">
            <div class="d-flex align-items-center">
                <i class="bi bi-list fs-4 me-3 d-lg-none" id="sidebarToggle" role="button"></i>
                <a href="{{ route('home') }}" class="text-decoration-none fw-bold fs-5" style="color: var(--sky-blue);">NanhaCare</a>
            </div>
            <div class="d-flex align-items-center gap-3">
                @include('components.notification-bell')
                <div class="dropdown">
                    <button class="btn dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-5"></i>
                        <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                        <span class="badge rounded-pill" style="background-color: var(--mint-green); color: var(--dark-text); font-size: 0.7rem;">
                            {{ ucfirst(str_replace('_', ' ', auth()->user()->getRoleNames()[0] ?? 'User')) }}
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('home') }}"><i class="bi bi-house me-2"></i>Home</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @if(session('success') || session('error') || session('warning'))
            @include('partials._toast')
        @endif

        @include('partials._confirm-modal')

        <div class="content-area">
            <div id="skeletonLoader" class="d-none">@include('components.skeletons.dashboard')</div>
            <div id="pageContent">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.querySelector('.sidebar-menu').classList.toggle('show');
        });
    </script>
    @stack('scripts')
</body>
</html>
