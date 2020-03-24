import slug from "./slug"

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

  getSeriesByTrack(track) {
    return this.series.find(x => x.tracks.map(x => x.id).includes(track.id))
  }

  getPlaylist(slug) {
    const playlist = this.playlists.find(x => x.slug === slug)
    if (!playlist) router.replace("/player/404")
    return playlist
  }

  getPlaylistsByTrack(track) {
    return this.playlists.filter(x => {
      return x.tracks.map(x => x.id).includes(track.id)
    })
  }

  // TODO: wip, also update database etc.
  newPlaylist(name, firstTrack) {
    this.playlists.unshift({
      id: null,
      title: name,
      slug: slug(name),
      tracks: firstTrack ? [{...firstTrack}] : [],
    })
    root.$emit("toast", {msg: "Playlist created"})
  }

  // TODO: wip, also update database etc.
  renamePlaylist(playlist, newName) {
    playlist.title = newName
    playlist.slug = slug(newName)
    root.$emit("toast", {msg: "Playlist renamed"})
  }

  // TODO: wip, also update database etc.
  deletePlaylist(slug) {
    const playlist = this.playlists.find(x => x.slug === slug)
    if (playlist === player.seriesOrPlaylist) player.reset()
    this.playlists.splice(this.playlists.indexOf(playlist), 1)
    root.$emit("toast", {msg: "Playlist deleted"})
  }

  // TODO: wip, also update database etc.
  addTrack(playlist, track) {
    playlist.tracks.push({...track})
    root.$emit("toast", {msg: "Track added"})
  }

  // TODO: wip, also update database etc.
  removeTrack(playlist, track) {
    playlist.tracks.splice(playlist.tracks.findIndex(x => x.id === track.id), 1)
    if (track === player.track) player.reset()
    root.$emit("toast", {msg: "Track removed"})
  }

  // TODO: wip, also update database etc.
  addToHistory(track) {
    this.history.unshift({...track})
    this.history = this.history.slice(0, 100) // save max 100 entries
  }

  // TODO: wip, also update database etc.
  clearHistory() {
    this.history = []
    root.$emit("toast", {msg: "History cleared"})
  }

  get tracks() {
    return this.series.reduce((a, v) => {
      a.push(...v.tracks)
      return a
    }, [])
  }
}

export default new Store()
