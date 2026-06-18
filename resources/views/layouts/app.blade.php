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
    @stack('styles')
    <style>
        :root {
            --sky-blue: #87CEEB;
            --baby-pink: #FFB6C1;
            --mint-green: #98D8C8;
            --off-white: #FAF9F6;
            --sunshine-yellow: #FFD700;
            --dark-text: #2D3436;
            --white: #FFFFFF;
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
        .bg-sky-blue { background-color: var(--sky-blue); }
        .bg-baby-pink { background-color: var(--baby-pink); }
        .bg-mint-green { background-color: var(--mint-green); }
        .bg-off-white { background-color: var(--off-white); }
        .bg-sunshine-yellow { background-color: var(--sunshine-yellow); }
    </style>
</head>
<body>
    @include('partials._navbar')

    @if(session('success') || session('error') || session('warning'))
        @include('partials._toast')
    @endif

    <main>
        @yield('content')
    </main>

    @include('partials._footer')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
