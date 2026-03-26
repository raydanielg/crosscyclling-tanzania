<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cross Tanzania Cycling') }}</title>

    <!-- SEO & Social Sharing (Open Graph) -->
    <meta name="description" content="Cross Tanzania Cycling Management System (CTCMS) - Moja kati ya jamii kubwa ya baiskeli Tanzania. Jiunge nasi leo kwa matukio, usajili, na habari za baiskeli.">
    <meta name="keywords" content="Cycling, Tanzania, Baiskeli, Cross Tanzania, CTCMS, Sports, Events">
    <meta property="og:site_name" content="Cross Tanzania Cycling">
    <meta property="og:title" content="Cross Tanzania Cycling - One Cycling Community">
    <meta property="og:description" content="CTCMS ni mfumo wa kisasa wa kusimamia shughuli za baiskeli Tanzania. Jiunge nasi kwa matukio, usimamizi wa wanachama, na taarifa za baiskeli.">
    <meta property="og:image" content="{{ asset('images/Highlights/DEE_1027.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@CrossTanzania">
    <meta name="twitter:title" content="Cross Tanzania Cycling">
    <meta name="twitter:description" content="One Cycling Community. Cross Tanzania. Jiunge na jamii ya wapenda baiskeli sasa.">
    <meta name="twitter:image" content="{{ asset('images/Highlights/DEE_1027.jpg') }}">


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/eco-e.png') }}">


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-white text-gray-900">
    <div class="min-h-screen">
        @yield('body')
    </div>
</body>
</html>
