<template>
  <div class="main_inner">
    <h1 class="sr">Series</h1>
    <div class="items">
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
    metaInfo: {
      title: "Series"
    },
    components: {SeriesItem},
    computed: {
      series: () => store.series,
    }
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
