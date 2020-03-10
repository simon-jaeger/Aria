const player = {
  audio: new Audio("/storage/tracks/field.mp3#61"),
  playing: false,
  currentTime: 0,
  series: null,
  track: null,

  play() {
    this.audio.play()
    this.playing = true
  },
  pause() {
    this.audio.pause()
    this.playing = false
  },
}

player.audio.addEventListener("timeupdate", () => {
  player.currentTime = player.audio.currentTime
})

export default player
