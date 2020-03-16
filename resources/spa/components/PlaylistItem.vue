<template>
  <div style="position: relative;">
    <RouterLink class="PlaylistItem" :to="'/player/playlists/' + playlist.slug">
      <h2 class="title">{{ playlist.title }}</h2>
      <small class="sub">
        {{ playlist.tracks.length }} Tracks
      </small>
    </RouterLink>
    <!-- TODO: del and rename playlist in context -->
    <button @click="deletePlaylist(playlist.slug)"
            class="action">
      more_vert
    </button>
  </div>
</template>

<script>
  export default {
    name: "PlaylistItem",
    props: ["playlist"],
    methods: {
      deletePlaylist: slug => store.deletePlaylist(slug)
    }
  }
</script>

<style scoped>
  .PlaylistItem {
    display: block;
    overflow: hidden;
    border-radius: 2px;
    background-color: var(--black5);
    box-shadow: var(--shadow1);
    padding: 1rem 3rem 1rem 1rem;
  }

  .title {
    margin-bottom: 0.25rem;
    font-weight: 700;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }

  .sub {
    color: var(--white6);
    font-size: 0.875rem;
  }

  .action {
    position: absolute;
    right: 0;
    bottom: 1.75rem;
    padding: 1rem;
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
    word-break: normal;
    color: var(--white6);
    font-weight: 400;
  }
  .action:hover,
  .action:focus {
    color: var(--white5);
  }
</style>
