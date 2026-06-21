<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'NanhaCare') - NanhaCare</title>
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/babysitters.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
    <link href="{{ asset('css/onboarding.css') }}" rel="stylesheet">
    <link href="{{ asset('css/marketplace.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('css/errors.css') }}" rel="stylesheet">
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
<body>
    @include('partials._navbar')

    @if(session('success') || session('error') || session('warning'))
        @include('partials._toast')
    @endif

    <main>
        <div id="skeletonPublic" class="d-none">@include('components.skeletons.public')</div>
        <div id="skeletonAuth" class="d-none">@include('components.skeletons.auth')</div>
        <div id="pageContent">
            @yield('content')
        </div>
    </main>

    @include('partials._footer')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/site.js') }}"></script>
    @stack('scripts')
</body>
</html>
