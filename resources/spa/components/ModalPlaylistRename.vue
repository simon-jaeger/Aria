<!-- TODO: wip, add functionality -->
<template>
  <Modal title="Rename playlist" name="playlist-rename">
    <div class="input">
      <label for="name" class="input_label">New name</label>
      <input type="text"
             id="name"
             class="input_field"
             value="old name">
    </div>
    <template v-slot:actions="modal">
      <button @click="modal.close()">Cancel</button>
      <button>Rename</button>
    </template>
  </Modal>
</template>

<script>
  import Modal from "./Modal"

  export default {
    name: "ModalPlaylistsRename",
    components: {Modal},
  }
</script>

<style scoped>

</style>
