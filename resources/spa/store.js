export default {
  series: [],
  seriesSingle: {},
  playlists: [],
  playlistsSingle: {},

  // TODO: wip, also update database and show toast etc.
  deletePlaylist(id) {
    this.playlists = this.playlists.filter(x => x.id !== id)
  },
}
