<template>
  <div class="main_inner is-box">
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
            <i class="button_icon">play_arrow<br></i>
            <span>Play</span>
          </button>
          <button @click="deletePlaylist(playlist.id)"
                  class="button is-secondary is-icon">
            <span class="button_icon is-alone">more_vert</span>
          </button>
        </div>
      </div>
    </header>

    <Tracks :tracks="playlist.tracks"/>
  </div>
</template>

<script>
  import Tracks from "../components/Tracks"
  import Vue from "vue"

  export default {
    name: "PlaylistsSingle",
    components: {Tracks},
    computed: {
      playlist() {
        return store.playlistsSingle[this.$route.params.slug]
      },
    },
    methods: {
      deletePlaylist(id) {
        store.deletePlaylist(id)
        this.$router.push("/player/playlists")
      },
    },
    async beforeRouteEnter(to, from, next) {
      if (!store.playlistsSingle[to.params.slug]) {
        Vue.set(
          store.playlistsSingle,
          to.params.slug,
          (await axios.get("/api/playlists/" + to.params.slug)).data
        )
      }
      next()
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
