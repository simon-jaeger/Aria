<template>
  <div class="main_inner">
    <h1 class="sr">Series</h1>
    <div class="items">
      <Item v-for="(aSeries, i) in series" :key="i" :data="aSeries"/>
    </div>
  </div>
</template>

<script>
  import Item from "../components/Item"

  export default {
    name: "Series",
    components: {Item},
    data() {
      return {
        series: []
      }
    },
    created() {
      axios.get("/api/series")
        .then(({data}) => this.series = data)
    }
  }
</script>

<style>
  .items {
    display: grid;
    grid-column-gap: 1rem;
    grid-row-gap: 1.5rem;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  }

  @media screen and (max-width: 479px) {
    .items {
      grid-template-columns: 1fr;
    }
  }
</style>
