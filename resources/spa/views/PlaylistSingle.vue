<template>
  <div class="main_inner is-box" v-if="playlist">
    <header class="header">
      <!-- TODO: playlist cover uses combination of covers of contained tracks? -->
      <div class="cover"></div>
      <div class="info">
        <h1>{{ playlist.title }}</h1>
        <small class="sub">
          {{ playlist.tracks.length }} Tracks &nbsp;•&nbsp;
          {{ playlist.tracks | map(x => x.duration) | sum | duration }}
        </small>
        <div class="actions">
          <button class="button">
            <span class="button_icon">play_arrow<br></span>
            <span>Play</span>
          </button>
          <button class="button is-secondary is-icon">
            <span class="button_icon is-alone">more_vert</span>
          </button>
        </div>
      </div>
    </header>

    <Tracks :tracks="playlist.tracks"/>
  </div>
  <Loading v-else/>
</template>

<script>
  import Tracks from "../components/Tracks"
  import Loading from "../components/Loading"

  export default {
    name: "PlaylistSingle",
    components: {Loading, Tracks},
    data() {
      return {
        playlist: this.$root.playlistsCache[this.$route.params.slug],
      }
    },
    created() {
      axios.get("/api/playlists/" + this.$route.params.slug)
        .then(({data}) => {
          this.playlist = data
          this.$root.playlistsCache[data.slug] = data // cache data
        })
    }
  }
</script>

<style scoped>
  .header {
    display: flex;
    margin-bottom: 3rem;
    align-items: center;
  }

  .cover {
    width: 10rem;
    height: 10rem;
    margin-right: 1.5rem;
    background-color: var(--white7);
  }

  .info {
    flex: 1;
  }

  .sub {
    margin-top: -0.5rem;
    margin-bottom: 1rem;
    color: var(--white6);
  }

  .actions {
    display: grid;
    justify-content: start;
    grid-auto-flow: column;
    grid-gap: 1rem;
  }

  @media screen and (max-width: 480px) {
    .header {
      display: block;
    }

    .cover {
      width: 100vw;
      height: 12rem;
      max-width: none;
      margin: -1.5rem 0 1.5rem -1.5rem;
      object-fit: cover;
      object-position: 50% 0;
    }
  }
</style>
