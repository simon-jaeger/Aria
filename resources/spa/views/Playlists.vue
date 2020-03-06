<template>
  <div class="main_inner" v-if="playlists">
    <h1 class="sr">Playlists</h1>
    <div class="items" v-if="playlists.length">
      <PlaylistItem v-for="playlist in playlists"
                    :key="playlist.id"
                    :playlist="playlist"/>
    </div>
    <!-- TODO: prettier no playlists notice, cta to create first? -->
    <div v-else>No playlists</div>
  </div>
  <Loading v-else/>
</template>

<script>
  import PlaylistItem from "../components/PlaylistItem"
  import Loading from "../components/Loading"

  export default {
    name: "Playlists",
    components: {Loading, PlaylistItem},
    computed: {
      playlists: () => store.playlists,
    }
  }
</script>

<style scoped>
  .items {
    display: grid;
    grid-column-gap: 1rem;
    grid-row-gap: 1.5rem;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  }
</style>
