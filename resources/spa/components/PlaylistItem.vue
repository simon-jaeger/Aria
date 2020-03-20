<template>
  <div style="position: relative;">
    <RouterLink class="PlaylistItem"
                :class="{'is-empty': !playlist.tracks.length}"
                :to="'/player/playlists/' + playlist.slug">
      <h2 class="title">{{ playlist.title }}</h2>
      <small class="sub">
        {{ playlist.tracks.length }} Tracks
      </small>
    </RouterLink>
    <Context>
      <button class="action">more_vert</button>
      <template v-slot:menu>
        <div class="contextMenu">
          <button @click="$root.$emit('modal-playlist-rename', {playlist})">
            <i>edit</i><span>Rename playlist</span>
          </button>
          <button @click="deletePlaylist(playlist.slug)">
            <i>delete</i><span>Delete playlist</span>
          </button>
        </div>
      </template>
    </Context>
  </div>
</template>

<script>
  import Context from "./Context"

  export default {
    name: "PlaylistItem",
    components: {Context},
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
  .PlaylistItem.is-empty {
    opacity: 0.5;
    pointer-events: none;
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

  .contextMenu {
    top: -2rem;
    right: 0.5rem;
  }
</style>
