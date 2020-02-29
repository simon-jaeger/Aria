export default {
  series: [],
  seriesSingle: {},
  playlists: [],
  playlistsSingle: {},
  history: [],

  // TODO: wip, also update database and show toast etc.
  deletePlaylist(id) {
    this.playlists = this.playlists.filter(x => x.id !== id)
  },

  // TODO: wip, also update database and show toast etc.
  clearHistory() {
    this.history = []
  },
}
