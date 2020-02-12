<template>
  <div class="main_inner" style="max-width: 800px">
    <h1 class="sr">Playlists</h1>
    <button @click="$root.$emit('modal-playlists-new')" class="new">
      + New Playlist
    </button>
    <transition-group name="t" tag="ul" class="items">
      <PlaylistItem v-for="playlist in playlists"
                    :key="playlist.id"
                    :playlist="playlist"/>
    </transition-group>
  </div>
</template>

<script>
  import PlaylistItem from "../components/PlaylistItem"

  export default {
    name: "Playlists",
    metaInfo: {
      title: "Playlists"
    },
    components: {PlaylistItem},
    computed: {
      playlists: () => store.playlists,
    }
  }
</script>

<style scoped>
  .new {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 5rem;
    margin-bottom: 1.5rem;
    padding: 1rem;
    border: 1px dashed var(--white7);
    color: var(--white6);
  }
  .new:hover,
  .new:focus {
    color: var(--white5);
    border-color: var(--blue6);
  }

  .items > *:not(:last-child) {
    margin-bottom: 1.5rem;
  }

  /* transition group */
  /******************************************************************************/
  .t-enter-active, .t-leave-active {
    transition: all 0.4s;
  }
  .t-enter, .t-leave-to {
    opacity: 0;
    height: 0;
    margin-bottom: 0 !important;
  }
  .t-enter-to, .t-leave {
    opacity: 1;
    height: 5rem;
  }
</style>
