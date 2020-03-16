<template>
  <div class="main_inner is-box">
    <header class="header">
      <div class="info">
        <h1>History</h1>
        <small class="sub">
          {{ history.length }} Tracks
        </small>
        <button @click="clearHistory" class="button is-secondary">
          <i class="button_icon">delete_sweep</i>
          <span>Clear history</span>
        </button>
      </div>
    </header>

    <Tracks
      v-if="history.length"
      :tracks="history"
      :numbered="false"
      @selection="onSelection($event)"/>
  </div>
</template>

<script>
  import Modal from "../components/Modal"
  import Tracks from "../components/Tracks"

  export default {
    name: "History",
    components: {Tracks, Modal},
    computed: {
      history: () => store.history,
    },
    methods: {
      onSelection(e) {
        const series = store.getSeriesByTrack(e.track)
        const track = series.tracks.find(x => x.id === e.track.id)
        this.$router.push("/player/series/" + series.slug)
        player.play(series, track)
      },
      clearHistory: () => store.clearHistory()
    }
  }
</script>

<style scoped>
  .header:not(:last-child) {
    margin-bottom: 3rem;
  }
  .sub {
    margin-top: -0.5rem;
    margin-bottom: 1rem;
    color: var(--white6);
  }
</style>
