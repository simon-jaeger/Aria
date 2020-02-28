<template>
  <div class="main_inner" v-if="series.length">
    <h1 class="sr">Series</h1>
    <div class="items">
      <SeriesItem v-for="aSeries in series"
                  :key="aSeries.id"
                  :series="aSeries"/>
    </div>
  </div>
  <Loading v-else/>
</template>

<script>
  import SeriesItem from "../components/SeriesItem"
  import Loading from "../components/Loading"

  export default {
    name: "Series",
    components: {Loading, SeriesItem},
    computed: {
      series() {
        return store.series
      },
    },
    async created() {
      if (!store.series.length) {
        store.series = (await axios.get("/api/series")).data
      }
      // prefetch details
      for (let series of store.series) {
        this.$set(
          store.seriesDetails,
          series.slug,
          (await axios.get("/api/series/" + series.slug)).data
        )
      }
    },
  }
</script>

<style scoped>
  .items {
    display: grid;
    grid-column-gap: 1rem;
    grid-row-gap: 1.5rem;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  }
</style>
