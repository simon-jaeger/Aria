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
  <!-- TODO: rm form fallbacks -->
  <style>
    /* forms */
    /*******************************************************************************
    simple fallbacks for prototyping
    use components to build actual, complex form and ui elements
    *******************************************************************************/
    form:not([class]) {
      display: grid;
      grid-gap: 1.5rem;
      margin-bottom: 1.5rem;
    }

    label:not([class]) {
      margin-bottom: 0.5rem;
    }

    small:not([class]) {
      font-size: 0.75rem;
      opacity: 0.8;
    }

    input:not([class]),
    select:not([class]),
    textarea:not([class]),
    button:not([class]),
    fieldset:not([class]) {
      border: 1px solid var(--white7);
      border-radius: 0.25rem;
      padding: 0.75rem;
    }

    input:not([class])[type="text"],
    input:not([class])[type="password"],
    input:not([class])[type="number"],
    input:not([class])[type="email"],
    input:not([class])[type="tel"],
    input:not([class])[type="date"],
    input:not([class])[type="month"],
    input:not([class])[type="week"],
    input:not([class])[type="time"],
    input:not([class])[type="url"],
    input:not([class])[type="search"],
    input:not([class])[type="range"],
    input:not([class])[type="file"],
    input:not([class])[type="image"],
    button:not([class]),
    textarea:not([class]) {
      width: 100%;
      flex-basis: 0;
    }

    button:not([class]) {
      text-align: center;
    }

    input:not([class]):focus,
    select:not([class]):focus,
    textarea:not([class]):focus,
    button:not([class]):hover,
    button:not([class]):active,
    button:not([class]):focus {
      border-color: var(--blue5);
    }

    option:not([class]) {
      background-color: var(--black5);
    }

    input:not([class])[type="checkbox"],
    input:not([class])[type="radio"] {
      height: 1.5rem;
      margin-right: 1ch;
      float: left;
    }

    input:not([class])[type="checkbox"]:focus,
    input:not([class])[type="radio"]:focus {
      outline: 1px solid var(--blue5);
    }

    input:not([class]) + small:not([class]) {
      margin-top: 0.5rem;
    }
  </style>
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
