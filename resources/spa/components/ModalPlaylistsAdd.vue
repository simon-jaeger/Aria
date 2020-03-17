<!-- TODO: wip, add functionality -->
<template>
  <Modal title="Add to..." name="playlists-add">
    <div class="checks">
      <!--
        TODO: check current playlist of track (sent with event?)
        maybe fetch playlists from api/tracks when modal opened?
      -->
      <div v-for="playlist in playlists" :key="playlist.id" class="check">
        <input type="checkbox" :id="playlist.id">
        <label :for="playlist.id" class="check_label">
          {{ playlist.title }}
        </label>
      </div>
    </div>

    <template v-slot:actions="modal">
      <button>+ New playlist</button>
      <button @click="modal.close()">Done</button>
    </template>
  </Modal>
</template>

<script>
  import Modal from "./Modal"

  export default {
    name: "ModalPlaylistsAdd",
    components: {Modal},
    computed: {
      playlists: () => store.playlists,
    }
  }
</script>

<style scoped>

</style>
