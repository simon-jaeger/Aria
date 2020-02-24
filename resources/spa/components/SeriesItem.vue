<template>
  <RouterLink class="seriesItem" :to="'/player/series/' + series.slug">
    <div class="seriesItem_cover" :style="{backgroundImage: `url(/storage/covers/${series.cover}`}"></div>
    <div class="seriesItem_body">
      <h2 class="seriesItem_title">{{ series.title }}</h2>
      <small class="seriesItem_sub">{{ series.tracks_count }} Tracks</small>
      <!-- TODO: fav dynamic and toggable. also, order favs first. -->
      <button @click.prevent="foo" class="seriesItem_action is-hearted">favorite</button>
    </div>
  </RouterLink>
</template>

<script>
  export default {
    name: "SeriesItem",
    props: ["series"],
    methods: {
      foo() {
        alert("heart clicked")
      }
    }
  }
</script>

<style scoped>
  .seriesItem {
    overflow: hidden;
    border-radius: 2px;
    background-color: var(--black5);
    box-shadow: var(--shadow1);
  }

  .seriesItem_cover {
    padding-bottom: 100%;
    background-size: cover;
  }

  .seriesItem_body {
    position: relative;
    padding: 1rem 3rem 1rem 1rem;
  }

  .seriesItem_title {
    margin-bottom: 0.25rem;
    font-weight: 700;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    width: 100%;
  }

  .seriesItem_sub {
    color: var(--white6);
    font-size: 0.875rem;
  }

  .seriesItem_action {
    position: absolute;
    top: 0;
    right: 0;
    padding: 1rem;
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
    word-break: normal;
    color: var(--white6);
    font-weight: 400;
  }
  .seriesItem_action.is-hearted {
    color: var(--pink5);
  }
  .seriesItem_action:hover,
  .seriesItem_action:focus {
    color: var(--white5);
  }

  @media screen and (max-width: 479px) {
    .seriesItem {
      display: flex;
    }
    .seriesItem_cover {
      flex: 0 0 5rem;
      padding-bottom: 0;
    }
    .seriesItem_body {
      flex: 1 0 0;
      overflow: hidden;
    }
  }
</style>
