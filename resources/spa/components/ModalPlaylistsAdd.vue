<!-- TODO: wip, add functionality -->
<template>
  <Modal title="Add to..." name="playlists-add">
    <div class="checks">
      <!--
        TODO: check current playlist of track (sent with event?)
      -->
      <div v-for="playlist in playlists" :key="playlist.slug" class="check">
        <input type="checkbox" :id="playlist.slug">
        <label :for="playlist.slug" class="check_label">
          {{ playlist.title }}
        </label>
      </div>
    </div>

    <template v-slot:actions="modal">
      <button @click="toNewPlaylist">+ New playlist</button>
      <button @click="$children[0].close()">Done</button>
    </template>
  </Modal>
</template>

<script>
  import Modal from "./Modal"

  export default {
    name: "ModalPlaylistsAdd",
    components: {Modal},
    data() {
      return {
        track: null
      }
    },
    computed: {
      playlists: () => store.playlists,
    },
    methods: {
      toNewPlaylist() {
        this.$children[0].close()
        setTimeout(() => this.$root.$emit("modal-playlists-new", {track: this.track}), 300)
      }
    },
    mounted() {
      this.$root.$on("modal-playlists-add", e => {
        this.track = e.track
      })
    },
  }
</script>

<style scoped>

</style>
