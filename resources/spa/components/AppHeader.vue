<template>
  <header class="header">
    <RouterLink to="/player" style="display: contents;">
      <img class="header_logo" src="/logo-aria.svg" alt="Aria logo">
    </RouterLink>

    <AppNav/>

    <div class="input is-search">
      <span class="input_searchicon">search</span>
      <label for="search" class="sr">Search</label>
      <input type="text"
             id="search"
             class="input_field is-search"
             placeholder="Search...">
    </div>

    <button class="mobilesearch">search</button>

    <button class="account">
      <span class="account_icon">person</span>
      <span class="account_text">Account</span>
      <Context/>
    </button>
  </header>
</template>

<script>
  import AppNav from "./AppNav"
  import Context from "./Context"

  export default {
    name: "AppHeader",
    components: {AppNav, Context}
  }
</script>

<style>
  .header {
    z-index: 10;
    width: 240px;
    height: 100vh;
    position: sticky;
    top: 0;
    background-color: var(--black5);
  }

  .header_logo {
    width: 100%;
    height: 6rem;
    padding: 2rem 4rem;
  }

  .account {
    position: relative;
    display: flex;
    padding: 1rem 1.5rem 1rem 1.75rem;
    color: var(--white6);
  }
  .account:hover,
  .account:focus {
    color: var(--white5);
  }

  .account_icon {
    margin-right: 1rem;
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
    font-size: 1.5rem;
    line-height: 1;
  }

  @media screen and (max-width: 1224px) {
    .header {
      display: flex;
      width: auto;
      height: 4rem;
      padding-right: 0.5rem;
      padding-left: 1.5rem;
      -webkit-box-align: center;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
    }

    .header_logo {
      width: auto;
      height: 1.5rem;
      margin-right: auto;
      padding: 0;
    }
  }

  @media screen and (max-width: 479px) {
    .header {
      border-bottom: 1px solid var(--white7);
    }

    .account {
      padding-right: 1rem;
      padding-left: 1rem;
    }

    .account_icon {
      margin-right: 0;
    }

    .account_text {
      display: none;
    }
  }
</style>
