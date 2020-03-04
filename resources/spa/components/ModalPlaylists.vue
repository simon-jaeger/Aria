<!-- TODO: wip, add functionality -->
<template>
  <Modal title="Add to..." name="playlists">
    <div class="checks">
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
    name: "ModalPlaylists",
    components: {Modal},
    computed: {
      playlists() {
        return store.playlists
      },
    }
  }
</script>

<style scoped>

</style>
