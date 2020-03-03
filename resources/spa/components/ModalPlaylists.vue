<!-- TODO: wip, add functionality -->
<template>
  <Modal title="Add to..." :visible="open" @close="open = false">
    <div class="checks">
      <div class="check">
        <input type="checkbox" checked id="1" name="fantasy-and-rpgs">
        <label for="1" class="check_label">Fantasy and RPGs</label>
      </div>
      <div class="check">
        <input type="checkbox" id="2" name="fantasy-and-rpgs">
        <label for="2" class="check_label">Weekend Playlist</label>
      </div>
      <div class="check">
        <input type="checkbox" id="3" name="fantasy-and-rpgs">
        <label for="3" class="check_label">Relaxing Tracks</label>
      </div>
    </div>

    <template v-slot:actions>
      <button>+ New playlist</button>
      <button>Done</button>
    </template>
  </Modal>
</template>

<script>
  import Modal from "./Modal"

  export default {
    name: "ModalPlaylists",
    components: {Modal},
    data() {
      return {
        open: false
      }
    },
    mounted() {
      this.$root.$on("modal-playlists", () => this.open = true)
    }
  }
</script>

<style scoped>

</style>
