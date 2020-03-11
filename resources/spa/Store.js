class Store {
  series = []
  /** @type {Array} */
  playlists = null
  history = []

  getSeries(slug) {
    const series = this.series.find(x => x.slug === slug)
    if (!series) router.replace("player/404")
    return series
  }

  getPlaylist(slug) {
    const playlist = this.playlists.find(x => x.slug === slug)
    if (!playlist) router.replace("player/404")
    return playlist
  }

  // TODO: wip, also update database etc.
  deletePlaylist(slug) {
    this.playlists.splice(this.playlists.findIndex(x => x.slug === slug), 1)
    root.$emit("toast", {msg: "Playlist deleted"})
  }

  // TODO: wip
  removeTrack(playlist, track) {
    playlist.tracks.splice(playlist.tracks.findIndex(x => x === track), 1)
  }

  // TODO: wip, also update database etc.
  clearHistory() {
    this.history = []
    root.$emit("toast", {msg: "History cleared"})
  }
}

export default new Store()
