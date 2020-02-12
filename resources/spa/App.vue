<template>
  <div v-if="ready" class="app">
    <AppHeader/>
    <main class="main">
      <RouterView :key="$route.path"/> <!-- use a key to force rerender -->
    </main>
    <AppPlayer/>
    <Toast/>
    <ModalPlaylistsNew/>
    <ModalPlaylistsRename/>
    <ModalPlaylistsAdd/>
  </div>
  <Loading v-else/>
</template>

<script>
  import AppHeader from "./components/AppHeader"
  import AppPlayer from "./components/AppPlayer"
  import Toast from "./components/Toast"
  import Loading from "./components/Loading"
  import ModalPlaylistsAdd from "./components/ModalPlaylistsAdd"
  import ModalPlaylistsRename from "./components/ModalPlaylistsRename"
  import ModalPlaylistsNew from "./components/ModalPlaylistsNew"

  export default {
    name: "App",
    metaInfo: {
      titleTemplate: "Aria | %s"
    },
    components: {
      ModalPlaylistsNew,
      ModalPlaylistsRename,
      ModalPlaylistsAdd,
      Loading, Toast, AppHeader, AppPlayer
    },
    computed: {
      ready: () => store.ready
    },
  }
</script>

<style>
  .app {
    display: flex;
  }

  .main {
    position: relative;
    padding: 3rem;
    flex: 1;
  }

  .main_inner {
    max-width: 1200px;
    margin-right: auto;
    margin-left: auto;
  }
  .main_inner.is-box {
    max-width: 800px;
    padding: 3rem;
    border-radius: 2px;
    background-color: var(--black5);
    box-shadow: var(--shadow1);
  }

  @media screen and (max-width: 1224px) {
    .app {
      display: block;
    }

    .main {
      padding: 1.5rem 1.5rem 9.5rem;
    }
  }

  @media screen and (max-width: 480px) {
    .main_inner.is-box {
      margin-top: -1.5rem;
      margin-right: -1.5rem;
      margin-left: -1.5rem;
      padding: 1.5rem;
    }
  }
</style>
