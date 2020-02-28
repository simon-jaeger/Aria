<template>
  <div class="main_inner" v-if="ready">
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
    data() {
      return {
        ready: false
      }
    },
    computed: {
      playlists() {
        return store.playlists
      },
    },
    async created() {
      store.playlists = (await axios.get("/api/playlists")).data
      this.ready = true
    },
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
