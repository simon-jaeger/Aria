<template>
  <div class="main_inner">
    <h1 class="sr">Playlists</h1>
    <div class="seriesItems" v-if="playlists.length">
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
    components: {PlaylistItem},
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

</style>
