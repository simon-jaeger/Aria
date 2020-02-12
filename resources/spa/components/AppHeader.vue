<template>
  <header class="header">
    <RouterLink to="/player" style="display: contents;">
      <img class="header_logo" src="/logo-aria.svg" alt="Aria logo">
    </RouterLink>

    <AppNav/>

    <div class="input is-search">
      <i class="input_searchicon">search</i>
      <label for="search" class="sr">Search</label>
      <input ref="search"
             @input="search($event.target.value)"
             type="text"
             autocomplete="off"
             id="search"
             class="input_field is-search"
             placeholder="Search...">
    </div>

    <Context>
      <button class="account">
        <i class="account_icon">person</i>
        <span class="account_text">Account</span>
      </button>
      <template v-slot:menu>
        <div class="contextMenu">
          <button @click="logout">
            <i>power_settings_new</i>
            <span>Log out</span>
          </button>
        </div>
      </template>
    </Context>

  </header>
</template>

<script>
  import AppNav from "./AppNav"
  import Context from "./Context"

  export default {
    name: "AppHeader",
    components: {AppNav, Context},
    methods: {
      search(q) {
        const action = this.$route.path === "/player/search" ? "replace" : "push"
        router[action]("/player/search?q=" + q).catch(e => console.warn(e))
      },
      logout() {
        axios.post("/logout").then(() => window.location = "/login")
      },
    },
    mounted() {
      root.$on("search-clear", () => this.$refs.search.value = "")
      root.$on("search-set", e => this.$refs.search.value = e.q)
    },
  }
</script>

<style scoped>
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
    width: 100%;
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

  .contextMenu {
    left: 1.75rem;
    right: auto
  }

  @media screen and (max-width: 1224px) {
    .header {
      display: flex;
      width: auto;
      height: 4rem;
      padding-right: 0.5rem;
      padding-left: 1.5rem;
      align-items: center;
    }

    .header_logo {
      width: auto;
      height: 1.5rem;
      margin-right: auto;
      padding: 0;
    }

    .contextMenu {
      left: auto;
      right: 0;
      margin-top: -0.25rem;
    }
  }

  @media screen and (max-width: 480px) {
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
