<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="utf-8"/>
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
  />

  <title>Aria | @yield('title')</title>
  <meta name="description" content="A music streaming app for soundtracks">
  <meta name="theme-color" content="#20242D" />
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon.png">

  <link rel="preload"
        href="/fonts/MaterialIcons-Regular.woff2"
        as="font"
        type="font/woff2"
        crossorigin>
  <link rel="stylesheet" href="/css/global.css">
  <link rel="stylesheet" href="/css/public.css">
</head>
<body>
<div class="site">
  <h1><img class="logo" src="/logo-aria.svg" alt="Aria"></h1>
  <h2 class="subtitle">The music streaming app for soundtracks</h2>

  <nav class="nav">
    <a href="/register"
       class="nav_link {{ request()->is('register') ? 'is-active' : '' }}">
      Sign up
    </a>
    <a href="/login"
       class="nav_link {{ request()->is('login') ? 'is-active' : '' }}">
      Log in
    </a>
    <a href="/about"
       class="nav_link {{ request()->is('about') ? 'is-active' : '' }}">
      About
    </a>
  </nav>

  @yield('content')
</div>
</body>
</html>
