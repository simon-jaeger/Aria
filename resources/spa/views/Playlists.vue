<template>
  <div class="main_inner">
    <h1 class="sr">Playlists</h1>
    <div class="items" v-if="playlists.length">
      <PlaylistItem v-for="playlist in playlists"
                    :key="playlist.id"
                    :playlist="playlist"/>
    </div>
    <Loading v-else/>
  </div>
</template>

<script>
  import PlaylistItem from "../components/PlaylistItem"
  import Loading from "../components/Loading"

  export default {
    name: "Playlists",
    components: {Loading, PlaylistItem},
    data() {
      return {
        playlists: []
      }
    },
    async created() {
      this.playlists = (await axios.get("/api/playlists")).data
      for (let playlist of this.playlists) { // prefetch and cache details
        this.$root.playlistsCache[playlist.slug] =
          (await axios.get("/api/playlists/" + playlist.slug)).data
      }
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
