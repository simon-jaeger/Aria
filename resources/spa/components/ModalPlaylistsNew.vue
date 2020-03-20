<template>
  <Modal title="New playlist" name="playlists-new">
    <div class="input">
      <label for="name" class="input_label">Name</label>
      <input type="text"
             id="name"
             class="input_field"
             maxlength="64"
             v-model.trim="name"
             @keyup.enter="newPlaylist">
    </div>
    <template v-slot:actions>
      <button @click="$children[0].close()">Cancel</button>
      <button @click="newPlaylist" :disabled="!nameValid">Create</button>
    </template>
  </Modal>
</template>

<script>
  import Modal from "./Modal"

  export default {
    name: "ModalPlaylistsNew",
    components: {Modal},
    data() {
      return {
        name: "",
        track: null,
      }
    },
    computed: {
      nameValid() {
        const isValidLength = /^.{1,64}$/.test(this.name)
        const isUnique = !store.playlists
          .map(x => x.title)
          .includes(this.name)
        return isValidLength && isUnique
      }
    },
    methods: {
      newPlaylist() {
        if (!this.nameValid) return
        store.newPlaylist(this.name, this.track)
        this.$children[0].close()
      },
    },
    mounted() {
      this.$root.$on("modal-playlists-new", e => {
        this.track = e ? e.track : null
      })
    },
  }
</script>

<style scoped>

</style>
