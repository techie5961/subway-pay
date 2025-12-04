<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- SEO Meta -->
   
   <meta name="author" content="Techie Innovations">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Greenify - Invest in Smart Packages & Earn Daily">
    <meta property="og:description" content="Start investing today with Greenify and enjoy daily returns. Secure, flexible, and easy withdrawals.">
    <meta property="og:image" content="{{ asset('images/logo.png?v='.config('versions.vite_version').'') }}"> <!-- Update with actual image -->
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Greenify - Smart Daily Investments">
    <meta name="twitter:description" content="Invest in Greenify and get daily earnings. Simple, secure and profitable.">
    <meta name="twitter:image" content="{{ asset('images/logo.png?v='.config('versions.vite_version').'') }}"> <!-- Update -->

    <title>{{ config('app.name') }} | Admins | @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png?v='.config('versions.vite_version').'') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg?v='.config('versions.vite_version').'') }}" />
<link rel="shortcut icon" href="{{  asset('favicon/favicon.ico?v='.config('versions.vite_version').'') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{  asset('favicon/apple-touch-icon.png?v='.config('versions.vite_version').'') }}" />
<meta name="apple-mobile-web-app-title" content="Greenify " />
<link rel="manifest" href="{{ asset('favicon/site.webmanifest?v='.config('versions.vite_version').'') }}" />
      <link rel="stylesheet" href="{{ asset('vitecss/fonts/fonts.css?v='.config('versions.vite_version').'') }}">
    <link rel="stylesheet" href="{{ asset('vitecss/css/app.css?v='.config('versions.vite_version').'') }}">
  <link rel="stylesheet" href="{{ asset('css/styles.css?v='.config('versions.styles_version').'') }}">
  <link rel="stylesheet" href="{{ asset('vitecss/css/admins/auth.css?v='.config('versions.vite_version').'') }}">

</head>

<body class="overflow-hidden">
<section class="loading pos-fixed highest c-primary column justify-center bg">
    <svg height="100" width="100" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><circle cx="12" cy="12" r="9.5" fill="none" stroke-width="3" stroke-linecap="round"><animate attributeName="stroke-dasharray" dur="1.5s" calcMode="spline" values="0 150;42 150;42 150;42 150" keyTimes="0;0.475;0.95;1" keySplines="0.42,0,0.58,1;0.42,0,0.58,1;0.42,0,0.58,1" repeatCount="indefinite"/><animate attributeName="stroke-dashoffset" dur="1.5s" calcMode="spline" values="0;-16;-59;-59" keyTimes="0;0.475;0.95;1" keySplines="0.42,0,0.58,1;0.42,0,0.58,1;0.42,0,0.58,1" repeatCount="indefinite"/></circle><animateTransform attributeName="transform" type="rotate" dur="2s" values="0 12 12;360 12 12" repeatCount="indefinite"/></g></svg>

</section>
  <section class="ball-loading row justify-center g-10">
  <div class="ball"></div>
  <div class="ball"></div>
  <div class="ball"></div>
</section>
<section class="bubbles">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</section>
    <header></header>
    <main>
        @yield('main')
    </main>
    <footer></footer>
    <script src="{{ asset('vitecss/js/app.js?v='.config('versions.vite_version').'') }}"></script>
    @yield('js')
</body>
</html>