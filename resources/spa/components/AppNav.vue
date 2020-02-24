<template>
  <nav class="nav">
    <RouterLink class="nav_link" to="/player/series">
      <span class="nav_icon">library_music</span>
      <span class="nav_text">Series</span>
    </RouterLink>
    <RouterLink class="nav_link" to="/player/playlists">
      <span class="nav_icon">queue_music</span>
      <span class="nav_text">Playlists</span>
    </RouterLink>
    <RouterLink class="nav_link" to="/player/history">
      <span class="nav_icon">history</span>
      <span class="nav_text">History</span>
    </RouterLink>
  </nav>

</template>

<script>
  export default {
    name: "AppNav"
  }
</script>

<style>
  .nav {
    margin-bottom: 6rem;
    background-color: var(--black5);
  }

  .nav_icon {
    margin-right: 1rem;
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
    font-size: 1.5rem;
    line-height: 1;
  }

  .nav_link {
    display: flex;
    padding: 1rem 1.5rem;
    border-left: 4px solid transparent;
    color: var(--white6);
  }
  .nav_link.is-active {
    border-left-color: var(--blue5);
    background-color: var(--blue7);
    color: var(--white5);
  }
  .nav_link:hover {
    background-color: var(--blue7);
    color: var(--white5);
  }

  @media screen and (max-width: 1224px) {
    .nav {
      position: fixed;
      z-index: 10;
      left: 0;
      right: 0;
      bottom: 0;
      display: flex;
      height: 4rem;
      margin-bottom: 0;
    }

    .nav_link {
      justify-content: center;
      flex: 1 0 0;
      border-left: none;
      border-bottom: 4px solid transparent;
    }
    .nav_link.is-active {
      border-bottom: 4px solid var(--blue5);
      border-left-style: none;
    }
    .nav_link:hover,
    .nav_link:focus {
      background-color: inherit;
      color: inherit;
    }
  }

  @media screen and (max-width: 479px) {
    .nav_link {
      flex-direction: column;
      align-items: center;
    }

    .nav_icon {
      margin-right: 0;
    }

    .nav_text {
      font-size: 0.875rem;
    }
  }
</style>
