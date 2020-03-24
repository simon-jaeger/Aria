<template>
  <div class="main_inner is-box">
    <header class="header">
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
          <Context>
            <button class="button is-secondary is-icon">
              <i class="button_icon is-alone">more_vert</i>
            </button>
            <template v-slot:menu>
              <div class="contextMenu">
                <button @click="$root.$emit('modal-playlists-rename', {playlist})">
                  <i>edit</i><span>Rename playlist</span>
                </button>
                <button @click="deletePlaylist(playlist.slug)">
                  <i>delete</i><span>Delete playlist</span>
                </button>
              </div>
            </template>
          </Context>
        </div>
      </div>
    </header>

    <Tracks :tracks="playlist.tracks"
            :playing="playing"
            :current-track="currentTrack"
            removable
            @remove="onRemove($event)"
            @selection="onSelection($event)"/>
  </div>
</template>

<script>
  import Tracks from "../components/Tracks"
  import Context from "../components/Context"

  export default {
    name: "PlaylistsSingle",
    metaInfo() {
      return {
        title: this.playlist.title
      }
    },
    components: {Context, Tracks},
    data() {
      return {
        playlist: store.getPlaylist(this.$route.params.slug)
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
      onRemove(e) {
        store.removeTrack(this.playlist, e.track)
      },
      pause: () => player.pause()
    },
  }
</script>

<style scoped>
  .header {
    margin-bottom: 3rem;
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

  .contextMenu {
    margin-top: 0.5rem;
  }

  @media screen and (max-width: 480px) {
    .header {
      display: block;
    }

    .actions {
      grid-template-columns: 1fr auto;
    }

    .contextMenu {
      right: 0;
    }
  }
</style>
