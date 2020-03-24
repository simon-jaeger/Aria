<template>
  <div class="main_inner is-box">
    <header class="header">
      <div class="info">
        <h1>Search</h1>
        <small class="sub">
          {{ matches.length }} Tracks found
        </small>
      </div>
    </header>

    <Tracks
      v-if="matches.length"
      :tracks="matches"
      :numbered="false"
      @selection="onSelection($event)"/>
  </div>
</template>

<script>
  import Tracks from "../components/Tracks"

  export default {
    name: "Search",
    metaInfo: {
      title: "Search"
    },
    components: {Tracks},
    data() {
      return {
        matches: []
      }
    },
    methods: {
      updateMatches() {
        const q = this.$route.query.q.toLowerCase()
        this.matches = store.tracks.filter(x => {
          return x.title.toLowerCase().includes(q)
        })
      },
      onSelection(e) {
        const series = store.getSeriesByTrack(e.track)
        this.$router.push("/player/series/" + series.slug)
        player.play(series, e.track)
      },
    },
    watch: {
      $route() {
        this.updateMatches()
      }
    },
    mounted() {
      this.updateMatches()
    },
    beforeRouteEnter(to, from, next) {
      // sync search input if navigated via back button or similar
      next(vm => vm.$root.$emit("search-set", {q: to.query.q}))
    },
    beforeRouteLeave(to, from, next) {
      next(root.$emit("search-clear"))
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
