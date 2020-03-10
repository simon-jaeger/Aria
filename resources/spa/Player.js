class Player {
  audio = new Audio()
  playing = false
  currentTime = 0
  duration = 0
  series = null
  track = null

  constructor() {
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
  }

  play(series, track) {
    if (series) {
      this.series = series
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
}

export default new Player()
