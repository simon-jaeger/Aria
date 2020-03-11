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
          <button v-if="playing && playlist === currentPlaylist"
                  @click="pause"
                  class="button action">
            <i class="button_icon">pause</i>
            <span>Pause</span>
          </button>
          <button v-else @click="playPlaylist" class="button action">
            <i class="button_icon">play_arrow</i>
            <span>Play</span>
          </button>
          <button @click="deletePlaylist(playlist.slug)"
                  class="button is-secondary is-icon">
            <span class="button_icon is-alone">more_vert</span>
          </button>
        </div>
      </div>
    </header>

    <Tracks :tracks="playlist.tracks"
            :playing="playing"
            :current-track="currentTrack"
            @selection="onSelection($event)"/>
  </div>
</template>

<script>
  import Tracks from "../components/Tracks"

  export default {
    name: "PlaylistsSingle",
    components: {Tracks},
    data() {
      return {
        playlist: null
      }
    },
    computed: {
      playing: () => player.playing,
      currentPlaylist: () => player.seriesOrPlaylist,
      currentTrack: () => player.track,
    },
    methods: {
      deletePlaylist(slug) {
        store.deletePlaylist(slug)
        this.$router.push("/player/playlists")
      },
      playPlaylist() {
        if (this.playlist === player.seriesOrPlaylist) player.play()
        else player.play(this.playlist, this.playlist.tracks[0])
      },
      onSelection(e) {
        if (e.track === player.track) player.toggle()
        else player.play(this.playlist, e.track)
      },
      pause: () => player.pause()
    },
    created() {
      this.playlist = store.getPlaylist(this.$route.params.slug)
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
    grid-template-columns: 7rem auto;
    justify-content: start;
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
