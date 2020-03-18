<!-- TODO: wip, add functionality -->
<template>
  <Modal title="Rename playlist" name="playlist-rename">
    <template v-if="playlist">
      <div class="input">
        <label for="newName" class="input_label">New name</label>
        <input type="text"
               id="newName"
               class="input_field"
               maxlength="32"
               v-model.trim="newName">
      </div>
    </template>
    <template v-slot:actions="modal">
      <button @click="modal.close()">Cancel</button>
      <button @click="rename(modal)" :disabled="!nameValid">Rename</button>
    </template>
  </Modal>
</template>

<script>
  import Modal from "./Modal"

  export default {
    name: "ModalPlaylistsRename",
    components: {Modal},
    data() {
      return {
        playlist: null,
        newName: "",
      }
    },
    computed: {
      nameValid() {
        const isValidLength = /^.{1,64}$/.test(this.newName)
        const isUnique = !store.playlists
          .map(x => x.title)
          .includes(this.newName)
        return isValidLength && isUnique
      }
    },
    methods: {
      rename(modal) {
        store.renamePlaylist(this.playlist, this.newName)
        modal.close()
      }
    },
    mounted() {
      this.$root.$on("modal-playlist-rename", e => {
        this.playlist = e.playlist
        this.newName = e.playlist.title
        // wait for input to become focusable, then focus
        setTimeout(() => {
          this.$el.querySelector("#newName").focus()
        }, 100)
      })
    },
  }
</script>

<style scoped>

</style>
