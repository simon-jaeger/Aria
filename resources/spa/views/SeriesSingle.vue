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
        <div class="actions">
          <button v-if="active"
                  @click="pause"
                  class="button">
            <i class="button_icon">pause</i>
            <span>Pause</span>
          </button>
          <button v-else
                  @click="resume"
                  class="button">
            <i class="button_icon">play_arrow</i>
            <span>Play</span>
          </button>
          <button class="button is-secondary is-icon">
            <span class="button_icon is-alone">favorite</span>
          </button>
        </div>
      </div>
    </header>

    <Tracks :tracks="series.tracks"
            :playing="playing"
            :current-track="currentTrack"
            @selection="play(series, $event)"/>
  </div>
</template>

<script>
  import Vue from "vue"
  import Tracks from "../components/Tracks"

  export default {
    name: "SeriesSingle",
    components: {Tracks},
    computed: {
      series() {
        return store.seriesSingle[this.$route.params.slug]
      },
      active() {
        return this.playing && this.currentSeries === this.series
      },

      playing: () => store.playing,
      currentTrack: () => store.currentTrack,
      currentSeries: () => store.currentSeries,
    },
    methods: {
      play(series, track) {
        if (this.playing && track === this.currentTrack) {
          return this.pause()
        }
        this.$root.$emit("player-play", {series, track})
      },
      pause() {
        this.$root.$emit("player-pause")
      },
      resume() {
        if (this.series === this.currentSeries) {
          return this.$root.$emit("player-play")
        }
        this.$root.$emit("player-play", {
          series: this.series,
          track: this.series.tracks[0]
        })
      },
    },
    async beforeRouteEnter(to, from, next) {
      if (!store.seriesSingle[to.params.slug]) {
        Vue.set(
          store.seriesSingle,
          to.params.slug,
          (await axios.get("/api/series/" + to.params.slug)).data
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
      max-width: none;
      height: 12rem;
      margin: -1.5rem 0 1.5rem -1.5rem;
      object-fit: cover;
      object-position: 50% 0;
    }
  }
</style>
