import axios from "axios"
import {toSlug} from "./utils"

class Store {
  ready = false
  series = []
  playlists = []
  history = []

  constructor() {
    Promise.all([
      axios.get("/api/series").then(({data}) => this.series = data),
      axios.get("/api/playlists").then(({data}) => this.playlists = data),
      axios.get("/api/history").then(({data}) => this.history = data),
    ]).finally(() => this.ready = true)
  }

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
    const playlist = {
      title,
      slug: toSlug(title),
      tracks: firstTrack ? [{...firstTrack}] : [],
    }
    axios.post("/api/playlists", playlist)
      .then(({data: playlist}) => {
        this.playlists.unshift(playlist)
        root.$emit("toast", {msg: "Playlist created"})
      })
  }

  renamePlaylist(playlist, newName) {
    playlist.title = newName
    playlist.slug = toSlug(newName)
    axios.put("/api/playlists/" + playlist.id, playlist).then(() => {
      root.$emit("toast", {msg: "Playlist renamed"})
    })
  }

  deletePlaylist(slug) {
    const playlist = this.playlists.find(x => x.slug === slug)
    if (playlist === player.seriesOrPlaylist) player.reset()
    const indexPlaylist = this.playlists.indexOf(playlist)
    this.playlists.splice(indexPlaylist, 1)

    root.$emit("toast", {
      msg: "Playlist deleted",
      callback: () => axios.delete("/api/playlists/" + playlist.id),
      abort: () => {
        this.playlists.splice(indexPlaylist, 0, playlist)
        root.$emit("toast", {msg: "Playlist restored"})
      },
    })
  }

  addTrack(playlist, track) {
    playlist.tracks.push({...track})
    axios.put("/api/playlists/" + playlist.id, playlist).then(() => {
      root.$emit("toast", {msg: "Track added"})
    })
  }

  removeTrack(playlist, track) {
    const indexTrack = playlist.tracks.findIndex(x => x.id === track.id)
    playlist.tracks.splice(indexTrack, 1)
    if (track === player.track) player.reset()

    root.$emit("toast", {
      msg: "Track removed",
      callback: () => axios.put("/api/playlists/" + playlist.id, playlist),
      abort: () => {
        playlist.tracks.splice(indexTrack, 0, track)
        root.$emit("toast", {msg: "Track restored"})
      },
    })
  }

  addToHistory(track) {
    this.history.unshift({...track})
    this.history = this.history.slice(0, 100) // save max 100 entries
    axios.put("/api/history", this.history)
  }

  clearHistory() {
    const oldHistory = JSON.parse(JSON.stringify(this.history))
    this.history = []

    root.$emit("toast", {
      msg: "History cleared",
      callback: () => axios.put("/api/history", this.history),
      abort: () => {
        this.history = oldHistory
        root.$emit("toast", {msg: "History restored"})
      },
    })
  }

  get tracks() {
    return this.series.reduce((a, v) => {
      a.push(...v.tracks)
      return a
    }, [])
  }
}

export default new Store()
