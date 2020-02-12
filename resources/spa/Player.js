class Player {
  audio = new Audio()
  playing = false
  currentTime = 0
  duration = 0
  seriesOrPlaylist = null
  track = null

  constructor() {
    // map state of audio element
    this.audio.addEventListener("play", () => {
      this.playing = true
    })
    this.audio.addEventListener("pause", () => {
      this.playing = false
    })
    this.audio.addEventListener("timeupdate", () => {
      this.currentTime = this.audio.currentTime
    })
    this.audio.addEventListener("durationchange", () => {
      this.duration = this.audio.duration
    })
    this.audio.addEventListener("ended", () => {
      store.addToHistory(this.track)
      this.playing = true
      // loop automatically
      if (this.indexCurrent === this.seriesOrPlaylist.tracks.length - 1) {
        this.play(null, this.seriesOrPlaylist.tracks[0])
      } else {
        this.next()
      }
    })

    // keyboard controls
    window.addEventListener("keydown", e => {
      if (["INPUT", "TEXTAREA"].includes(document.activeElement.tagName)) return
      if (!this.track) return

      switch (e.code) {
        case "Space":
          e.preventDefault() // prevent scrolling
          this.toggle()
          break
        case "ArrowLeft":
          this.prev()
          break
        case "ArrowRight":
          this.next()
          break
      }
    })
  }

  play(seriesOrPlaylist, track) {
    if (seriesOrPlaylist) {
      this.seriesOrPlaylist = seriesOrPlaylist
    }
    if (track) {
      this.track = track
      this.audio.src = "/storage/tracks/" + track.file
    }
    this.audio.play()
  }

  pause() {
    this.audio.pause()
  }

  toggle() {
    if (this.playing) this.pause()
    else this.play()
  }

  seek(seconds) {
    this.audio.currentTime = seconds
  }

  next() {
    const nextTrack = this.seriesOrPlaylist.tracks[this.indexCurrent + 1]
    this.play(null, nextTrack)
  }

  prev() {
    const prevTrack = this.seriesOrPlaylist.tracks[this.indexCurrent - 1]
    this.play(null, prevTrack)
  }

  reset() {
    this.pause()
    this.track = null
    this.seriesOrPlaylist = null
    this.playing = false
  }

  get indexCurrent() {
    return this.seriesOrPlaylist.tracks.indexOf(this.track)
  }
}

export default new Player()
