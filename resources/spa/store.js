export default {
  series: [],
  seriesSingle: {},
  playlists: null,
  playlistsSingle: {},
  history: [],

  playing: false,
  currentSeries: null,
  currentTrack: null,

  // TODO: wip, also update database etc.
  deletePlaylist(slug) {
    delete this.playlistsSingle[slug]
    this.playlists.splice(this.playlists.findIndex(x => x.slug === slug), 1)
    root.$emit("toast", {msg: "Playlist deleted"})
  },

  // TODO: wip, also update database etc.
  clearHistory() {
    this.history = []
    root.$emit("toast", {msg: "History cleared"})
  },
}
