<template>
  <Modal title="Rename playlist" name="playlists-rename">
    <div class="input">
      <label for="newName" class="input_label">New name</label>
      <input type="text"
             id="newName"
             class="input_field"
             maxlength="32"
             v-model.trim="newName"
             @keydown.enter="rename">
    </div>
    <template v-slot:actions>
      <button @click="$children[0].close()">Cancel</button>
      <button @click="rename" :disabled="!nameValid">Rename</button>
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
        const isValidLength = /^.{1,32}$/.test(this.newName)
        const isUnique = !store.playlists
          .map(x => x.title)
          .includes(this.newName)
        return isValidLength && isUnique
      }
    },
    methods: {
      rename() {
        if (!this.nameValid) return
        store.renamePlaylist(this.playlist, this.newName)
        this.$children[0].close()
      }
    },
    mounted() {
      this.$root.$on("modal-playlists-rename", e => {
        this.playlist = e.playlist
        this.newName = e.playlist.title
      })
    },
  }
</script>

<style scoped>

</style>
