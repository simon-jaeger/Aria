<template>
  <div class="main_inner">
    <h1 class="sr">Playlists</h1>
    <div class="items">
      <button @click="$root.$emit('modal-playlists-new')" class="new">
        + New Playlist
      </button>
      <PlaylistItem v-for="playlist in playlists"
                    :key="playlist.id"
                    :playlist="playlist"/>
    </div>
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
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 5rem;
    padding: 1rem;
    border: 1px dashed var(--white7);
    color: var(--white6);
  }
  .new:hover,
  .new:focus {
    color: var(--white5);
    border-color: var(--blue6);
  }

  .items {
    max-width: 800px;
    margin: 0 auto;
  }
  .items > *:not(:last-child) {
    margin-bottom: 1.5rem;
  }
</style>
