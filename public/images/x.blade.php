<head>
    <!-- Meta Basics -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta -->
    <title>{{ config('app.name') }} | Smart Investment Packages for Daily Passive Income</title>
    <meta name="description" content="{{ config('app.name') }} lets you invest in reliable packages and earn daily profits. Withdraw anytime. Transparent. Flexible. Profitable. Join thousands building daily income.">
    <meta name="keywords" content="{{ config('app.name') }}, investment, daily profit, earn online, financial freedom, investment platform, passive income, earn daily, flexible withdrawal">
    <meta name="author" content="Techie Innovations">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ config('app.name') }} - Invest in Smart Packages & Earn Daily">
    <meta property="og:description" content="Start investing today with {{ config('app.name') }} and enjoy daily returns. Secure, flexible, and easy withdrawals.">
    <meta property="og:image" content="{{ asset('images/logo.png?v='.config('versions.vite_version').'') }}"> <!-- Update with actual image -->
    <meta property="og:url" content="{{ url() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name') }} - Smart Daily Investments">
    <meta name="twitter:description" content="Invest in {{ config('app.name') }} and get daily earnings. Simple, secure and profitable.">
    <meta name="twitter:image" content="{{ asset('images/logo.png?v='.config('versions.vite_version').'') }}"> <!-- Update -->

    <!-- Favicons -->
    <link rel="icon" href="/assets/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon-16x16.png">

    <!-- Web App Manifest (optional for PWA) -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#0d6efd">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-pBnc..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Laravel or your framework's main CSS file -->

    <!-- Scripts -->
    <script defer src="{{ asset('js/app.js') }}"></script> <!-- Main JS -->
</head>