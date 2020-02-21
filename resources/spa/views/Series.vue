<template>
  <div class="main_inner">
    <h1 class="sr">Series</h1>
    <div class="seriesItems">
      <SeriesItem v-for="aSeries in series"
                  :key="aSeries.id"
                  :series="aSeries"/>
    </div>
  </div>
</template>

<script>
  import SeriesItem from "../components/SeriesItem"

  export default {
    name: "Series",
    components: {SeriesItem},
    data() {
      return {
        series: []
      }
    },
    created() {
      axios.get("/api/series")
        .then(({data}) => this.series = data)
    },
  }
</script>

<style>
  .seriesItems {
    display: grid;
    grid-column-gap: 1rem;
    grid-row-gap: 1.5rem;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  }

  @media screen and (max-width: 479px) {
    .seriesItems {
      grid-template-columns: 1fr;
    }
  }
</style>
