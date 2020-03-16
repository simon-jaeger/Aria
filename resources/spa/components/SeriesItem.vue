<template>
  <RouterLink class="seriesItem" :to="'/player/series/' + series.slug">
    <div class="seriesItem_cover"
         :style="{backgroundImage: `url(/storage/covers/${series.cover}`}"></div>
    <div class="seriesItem_body">
      <h2 class="seriesItem_title">{{ series.title }}</h2>
      <small class="seriesItem_sub">{{ series.tracks.length }} Tracks</small>
    </div>
  </RouterLink>
</template>

<script>
  export default {
    name: "SeriesItem",
    props: ["series"],
  }
</script>

<style scoped>
  .seriesItem {
    display: block;
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
    padding: 1rem;
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

  @media screen and (max-width: 480px) {
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
