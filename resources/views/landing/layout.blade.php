<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0f2d4d">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Cross Tanzania Cycling'))</title>

    <!-- SEO & Social Sharing (Open Graph) -->
    <meta name="description" content="Cross Tanzania Cycling Management System (CTCMS) - Moja kati ya jamii kubwa ya baiskeli Tanzania. Jiunge nasi leo kwa matukio, usajili, na habari za baiskeli.">
    <meta name="keywords" content="Cycling, Tanzania, Baiskeli, Cross Tanzania, CTCMS, Sports, Events, Cycling Community">
    <meta name="author" content="Cross Tanzania Cycling">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:site_name" content="Cross Tanzania Cycling">
    <meta property="og:title" content="Cross Tanzania Cycling - One Cycling Community">
    <meta property="og:description" content="CTCMS ni mfumo wa kisasa wa kusimamia shughuli za baiskeli Tanzania. Jiunge nasi kwa matukio, usimamizi wa wanachama, na taarifa za baiskeli.">
    <meta property="og:image" content="{{ asset('logo.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="sw_TZ">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@CrossTanzania">
    <meta name="twitter:title" content="Cross Tanzania Cycling">
    <meta name="twitter:description" content="One Cycling Community. Cross Tanzania. Jiunge na jamii ya wapenda baiskeli sasa.">
    <meta name="twitter:image" content="{{ asset('logo.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/eco-e.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/eco-e.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

    <style>
        [x-cloak] { display: none !important; }
        .font-poppins { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col">
        @yield('body')
    </div>

    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 60,
        });
    </script>
</body>
</html>
