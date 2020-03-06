<!-- TODO: make dynamic -->
<!-- TODO: keyboard controls? space for toggle etc? -->
<template>
  <aside class="player">
    <!-- TODO: hide when ui done (no controls and styles) -->
    <audio ref="audio"
           src="/storage/tracks/demo.mp3"
           controls
           @loadedmetadata="onLoadedmetadata"
           @timeupdate="onTimeupdate"
           @play="onPlaypause"
           @pause="onPlaypause"
           style="width: 100%;height: 2rem;"></audio>

    <div class="player_track">
      <div class="player_info">
        <div class="player_title">Fair Theme</div>
        <div class="player_sub">
          RPG Soundtrack Pack<br>
          {{ currentTime | duration }} / {{ duration | duration }}
        </div>
        <button class="player_more">more_vert</button>
      </div>
    </div>

    <div @click="jump($event)" class="player_progress">
      <span class="player_progressfill"
            :style="{width: currentTime / duration * 100 + '%'}"></span>
      <span class="player_progressempty"></span>
    </div>

    <div class="player_actions">
      <button class="player_action">skip_previous</button>
      <button v-if="playing" @click="pause" class="player_action is-big">
        pause_circle_filled
      </button>
      <button v-else @click="play" class="player_action is-big">
        play_circle_filled
      </button>
      <button class="player_action">skip_next</button>
    </div>
  </aside>
</template>

<script>
  export default {
    name: "AppPlayer",
    data() {
      return {
        // TODO: get duration from api data directly (onloadedmeta not needed?)
        duration: 0,
        currentTime: 0,
      }
    },
    computed: {
      playing() {
        return store.playing
      },
      track() {
        return store.currentTrack
      },
      series() {
        return store.currentSeries
      },
    },
    methods: {
      play() {
        this.$refs.audio.play()
        store.playing = true
      },
      pause() {
        this.$refs.audio.pause()
        store.playing = false
      },
      jump(e) {
        this.$refs.audio.currentTime =
          this.$refs.audio.duration * (e.offsetX / e.target.offsetWidth)
      },
      onLoadedmetadata() {
        this.duration = this.$refs.audio.duration
      },
      onTimeupdate() {
        this.currentTime = this.$refs.audio.currentTime
      },
      onPlaypause() {
        store.playing = !this.$refs.audio.paused
      },
    },
    mounted() {
      this.$root.$on("player-play", e => {
        store.currentSeries = e.series
        store.currentTrack = e.track
        this.play()
      })
      this.$root.$on("player-pause", () => {
        this.pause()
      })
    }
  }
</script>

<style scoped>
  .player {
    width: 240px;
    height: 100vh;
    position: sticky;
    top: 0;
    padding: 3rem 1rem 1rem;
    background-color: var(--black5);
  }

  .player_track {
    position: relative;
    margin-bottom: 0.5rem;
    padding-bottom: 100%;
    background-image: url('/storage/covers/zelda-the-legend-of.jpg');
    background-size: cover;
  }

  .player_info {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 1rem;
    background-color: var(--blackA);
  }

  .player_title {
    margin-bottom: 0.25rem;
    margin-right: 2rem;
    font-weight: 700;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }

  .player_sub {
    margin-right: 1.5rem;
    color: var(--white6);
    font-size: 0.875rem;
  }

  .player_more {
    position: absolute;
    top: 0;
    right: 0;
    padding: 1rem;
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
    color: var(--white6);
  }
  .player_more:hover,
  .player_more:focus {
    color: var(--white5);
  }

  .player_progress {
    display: flex;
    height: 3rem;
    align-items: center;
    cursor: pointer;
  }

  .player_progressfill {
    height: 4px;
    flex: 0 0 auto;
    background-color: var(--blue5);
    pointer-events: none;
  }

  .player_progressempty {
    height: 4px;
    flex: 1;
    background-color: var(--white7);
    pointer-events: none;
  }

  .player_actions {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .player_action {
    padding: 0.75rem;
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
    color: var(--white6);
    font-size: 1.5rem;
    line-height: 1;
  }
  .player_action.is-big {
    font-size: 3rem;
  }
  .player_action:hover,
  .player_action:focus {
    color: var(--white5);
  }

  @media screen and (max-width: 1224px) {
    .player {
      display: none;
    }
    .player.is-open {
      position: absolute;
      left: 0;
      top: 4rem;
      right: 0;
      bottom: 4rem;
      display: block;
      width: auto;
      height: auto;
      border-top: 1px solid var(--white7);
      border-bottom: 1px solid var(--white7);
    }

    .player_track {
      max-width: 320px;
      margin-right: auto;
      margin-left: auto;
    }

    .player_progress {
      max-width: 400px;
      margin-right: auto;
      margin-left: auto;
    }

    .player_actions {
      max-width: 400px;
      margin-right: auto;
      margin-left: auto;
    }
  }
</style>
