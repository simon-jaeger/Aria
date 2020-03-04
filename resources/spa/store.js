export default {
  series: [],
  seriesSingle: {},
  playlists: null,
  playlistsSingle: {},
  history: [],

  // TODO: wip, also update database and show toast etc.
  deletePlaylist(id) {
    this.playlists = this.playlists.filter(x => x.id !== id)
    root.$emit("toast", {msg: "Playlist deleted"})
  },

  // TODO: wip, also update database and show toast etc.
  clearHistory() {
    this.history = []
    root.$emit("toast", {msg: "History cleared"})
  },
}
