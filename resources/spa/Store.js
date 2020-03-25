import toSlug from "./toSlug"

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

  newPlaylist(title, firstTrack) {
    const slug = toSlug(title)
    const tracks = firstTrack ? [{...firstTrack}] : []
    axios.post("/api/playlists", {title, slug, tracks})
      .then(({data: playlist}) => {
        this.playlists.unshift(playlist)
        root.$emit("toast", {msg: "Playlist created"})
      })
  }

  renamePlaylist(playlist, newName) {
    playlist.title = newName
    playlist.slug = toSlug(newName)
    axios.patch("/api/playlists/" + playlist.id, {
      title: playlist.title,
      slug: playlist.slug
    }).then(() => root.$emit("toast", {msg: "Playlist renamed"}))
  }

  deletePlaylist(slug) {
    const playlist = this.playlists.find(x => x.slug === slug)
    if (playlist === player.seriesOrPlaylist) player.reset()
    this.playlists.splice(this.playlists.indexOf(playlist), 1)
    root.$emit("toast", {msg: "Playlist deleted"})
    // TODO: add undo functionality? axios as callback for toast, only called if not aborted?
    axios.delete("/api/playlists/" + playlist.id)
  }

  addTrack(playlist, track) {
    playlist.tracks.push({...track})
    axios.patch("/api/playlists/" + playlist.id, {track})
      .then(() => root.$emit("toast", {msg: "Track added"}))
  }

  // TODO: wip, also update database etc.
  removeTrack(playlist, track) {
    playlist.tracks.splice(playlist.tracks.findIndex(x => x.id === track.id), 1)
    if (track === player.track) player.reset()
    axios.patch("/api/playlists/" + playlist.id, {track})
      .then(() => root.$emit("toast", {msg: "Track removed"}))
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
