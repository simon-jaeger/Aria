<template>
  <div class="main_inner is-box">
    <header class="header">
      <img :src="'/storage/covers/' + series.cover"
           :alt="series.title"
           class="cover">
      <div class="info">
        <h1>{{ series.title }}</h1>
        <small class="sub">
          {{ series.tracks.length }} Tracks &nbsp;•&nbsp;
          {{ series.tracks | map(x => x.duration) | sum | duration }}
        </small>
        <button v-if="playing && series === currentSeries"
                @click="pause"
                class="button action">
          <i class="button_icon">pause</i>
          <span>Pause</span>
        </button>
        <button v-else @click="playSeries" class="button action">
          <i class="button_icon">play_arrow</i>
          <span>Play</span>
        </button>
      </div>
    </header>

    <Tracks :tracks="series.tracks"
            :playing="playing"
            :current-track="currentTrack"
            @selection="onSelection($event)"/>
  </div>
</template>

<script>
  import Tracks from "../components/Tracks"

  export default {
    name: "SeriesSingle",
    components: {Tracks},
    data() {
      return {
        series: store.getSeries(this.$route.params.slug)
      }
    },
    computed: {
      playing: () => player.playing,
      currentSeries: () => player.seriesOrPlaylist,
      currentTrack: () => player.track,
    },
    methods: {
      playSeries() {
        if (this.series === player.seriesOrPlaylist) player.play()
        else player.play(this.series, this.series.tracks[0])
      },
      onSelection(e) {
        if (e.track === player.track) player.toggle()
        else player.play(this.series, e.track)
      },
      pause: () => player.pause()
    },
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
  }

  .info {
    flex: 1;
  }

  .sub {
    margin-top: -0.5rem;
    margin-bottom: 1rem;
    color: var(--white6);
  }

  .action {
    width: 7rem;
  }

  @media screen and (max-width: 480px) {
    .header {
      display: block;
    }

    .cover {
      width: 100vw;
      max-width: none;
      height: 12rem;
      margin: -1.5rem 0 1.5rem -1.5rem;
      object-fit: cover;
      object-position: 50% 0;
    }

    .action {
      width: 100%;
    }
  }
</style>
