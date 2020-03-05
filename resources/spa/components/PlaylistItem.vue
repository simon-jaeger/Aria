<template>
  <div style="position: relative;">
    <RouterLink class="PlaylistItem" :to="'/player/playlists/' + playlist.slug">
      <!-- TODO: cover based on tracks in playlist -->
      <div class="PlaylistItem_cover"></div>
      <div class="PlaylistItem_body">
        <h2 class="PlaylistItem_title">{{ playlist.title }}</h2>
        <small class="PlaylistItem_sub">{{ playlist.tracks_count }}
          Tracks</small>
      </div>
    </RouterLink>
    <!-- TODO: del and rename playlist in context -->
    <button @click="deletePlaylist(playlist.slug)"
            class="PlaylistItem_action">more_vert
    </button>
  </div>
</template>

<script>
  export default {
    name: "PlaylistItem",
    props: ["playlist"],
    methods: {
      deletePlaylist(slug) {
        store.deletePlaylist(slug)
      },
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
  }

  .PlaylistItem_cover {
    padding-bottom: 100%;
    background-color: var(--white7);
  }

  .PlaylistItem_body {
    padding: 1rem 3rem 1rem 1rem;
  }

  .PlaylistItem_title {
    margin-bottom: 0.25rem;
    font-weight: 700;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    width: 100%;
  }

  .PlaylistItem_sub {
    color: var(--white6);
    font-size: 0.875rem;
  }

  .PlaylistItem_action {
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
  .PlaylistItem_action:hover,
  .PlaylistItem_action:focus {
    color: var(--white5);
  }

  @media screen and (max-width: 480px) {
    .PlaylistItem {
      display: flex;
    }
    .PlaylistItem_cover {
      flex: 0 0 5rem;
      padding-bottom: 0;
    }
    .PlaylistItem_body {
      flex: 1 0 0;
      overflow: hidden;
    }
  }
</style>
