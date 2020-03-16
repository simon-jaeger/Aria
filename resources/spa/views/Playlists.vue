<template>
  <div class="main_inner">
    <h1 class="sr">Playlists</h1>
    <div class="items" v-if="playlists.length">
      <PlaylistItem v-for="playlist in playlists"
                    :key="playlist.id"
                    :playlist="playlist"/>
    </div>
    <!-- TODO: prettier no playlists notice, cta to create first? -->
    <div v-else>No playlists</div>
  </div>
</template>

<script>
  import PlaylistItem from "../components/PlaylistItem"

  export default {
    name: "Playlists",
    components: {PlaylistItem},
    computed: {
      playlists: () => store.playlists,
    }
  }
</script>

<style scoped>
  .items {
    max-width: 800px;
    margin: 0 auto;
  }
  .items > *:not(:last-child) {
    margin-bottom: 1.5rem;
  }
</style>
