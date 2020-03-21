<template>
  <Modal title="Add to..." name="playlists-add">
    <div v-if="playlists.length" class="checks">
      <!--
        TODO: check current playlist of track (sent with event?)
      -->
      <div v-for="playlist in playlists" :key="playlist.slug" class="check">
        <input type="checkbox"
               :id="playlist.slug"
               :value="playlist"
               v-model="playlistsTrack"
               @change="toggle($event, playlist)">
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
        track: null,
        playlistsTrack: [],
      }
    },
    computed: {
      playlists: () => store.playlists,
    },
    methods: {
      toggle(e, playlist) {
        const checked = e.target.checked
        if (checked) store.addTrack(playlist, this.track)
        else store.removeTrack(playlist, this.track)
      },
      toNewPlaylist() {
        this.$children[0].close()
        this.$root.$emit("modal-playlists-new", {track: this.track})
      }
    },
    mounted() {
      this.$root.$on("modal-playlists-add", e => {
        this.track = e.track
        this.playlistsTrack = store.getPlaylistsByTrack(e.track)
      })
    },
  }
</script>

<style scoped>

</style>
