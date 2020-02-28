<template>
  <div class="main_inner is-box" v-if="series">
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
          <button class="button">
            <span class="button_icon">play_arrow<br></span>
            <span>Play</span>
          </button>
          <button class="button is-secondary is-icon">
            <span class="button_icon is-alone">favorite</span>
          </button>
        </div>
      </div>
    </header>

    <Tracks :tracks="series.tracks"/>
  </div>
  <Loading v-else/>
</template>

<script>
  import Tracks from "../components/Tracks"
  import Loading from "../components/Loading"

  export default {
    name: "SeriesSingle",
    components: {Loading, Tracks},
    computed: {
      series() {
        return store.seriesDetails[this.$route.params.slug]
      },
    },
    created() {
      axios.get("/api/series/" + this.$route.params.slug)
        .then(({data}) => {
          this.$set(store.seriesDetails, data.slug, data)
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
      max-width: none;
      height: 12rem;
      margin: -1.5rem 0 1.5rem -1.5rem;
      object-fit: cover;
      object-position: 50% 0;
    }
  }
</style>
