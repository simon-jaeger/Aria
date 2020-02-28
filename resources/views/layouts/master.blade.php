<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="utf-8"/>
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
  />

  <title>Aria</title>
  <meta name="description" content="A music streaming app for soundtracks">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon.png">

  <link rel="preload"
        href="/fonts/MaterialIcons-Regular.woff2"
        as="font"
        type="font/woff2"
        crossorigin>
  <link rel="stylesheet" href="/css/global.css">
  @stack('styles')
  <script src="/js/global.js" defer></script>
  @stack('scripts')
</head>
<body>
<div class="site">
  <ul>
    <li><a href="/">Index</a></li>
    <li><a href="/register">Register</a></li>
    <li><a href="/login">Login</a></li>
    <li><a href="/player">Player</a></li>
    <li>
      <form method="post" action="/logout">
        @csrf
        <button class="_" type="submit">Log out</button>
      </form>
    </li>
  </ul>
  <hr>
  @yield('content')
</div>
</body>
</html>
