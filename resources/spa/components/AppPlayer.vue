<!-- TODO: cta when no track selected yet -->
<!-- TODO: context: add to playlist, loop ON/OFF, random ON/OFF (exlude current) -->
<template>
  <aside class="player">
    <template v-if="track">
      <RouterLink :to="link" class="player_track" :style="{backgroundImage: `url('${cover}')`}">
        <div class="player_info">
          <div class="player_title">{{ track.title }}</div>
          <div class="player_sub">
            <div class="player_seriesOrPlaylist">{{ seriesOrPlaylist.title }}
            </div>
            <div>{{ currentTime | duration }} / {{ duration | duration }}</div>
          </div>
          <button class="player_more">more_vert</button>
        </div>
      </RouterLink>

      <div @click="jump($event)" class="player_progress">
      <span class="player_progressfill"
            :style="{width: currentTime / duration * 100 + '%'}"></span>
        <span class="player_progressempty"></span>
      </div>

      <div class="player_actions">
        <button @click="prev"
                :disabled="indexCurrent === 0"
                class="player_action">skip_previous
        </button>
        <button v-if="playing" @click="pause" class="player_action is-big">
          pause_circle_filled
        </button>
        <button v-else @click="play" class="player_action is-big">
          play_circle_filled
        </button>
        <button @click="next"
                :disabled="indexCurrent === seriesOrPlaylist.tracks.length - 1"
                class="player_action">skip_next
        </button>
      </div>
    </template>
    <!-- TODO: prettier no track msg with cta -->
    <template v-else>no track</template>
  </aside>
</template>

<script>
  export default {
    name: "AppPlayer",
    computed: {
      cover: () => {
        const series = store.getSeriesByTrack(player.track)
        return "/storage/covers/" + series.cover
      },
      link: () => {
        const series = store.series.find(x => x === player.seriesOrPlaylist)
        if (series) return "/player/series/" + series.slug

        const playlist = store.playlists.find(x => x === player.seriesOrPlaylist)
        return "/player/playlists/" + playlist.slug
      },
      playing: () => player.playing,
      currentTime: () => player.currentTime,
      duration: () => player.duration,
      seriesOrPlaylist: () => player.seriesOrPlaylist,
      track: () => player.track,
      indexCurrent: () => player.indexCurrent,
    },
    methods: {
      jump(e) {
        player.seek(player.duration * (e.offsetX / e.target.offsetWidth))
      },
      play: () => player.play(),
      pause: () => player.pause(),
      prev: () => player.prev(),
      next: () => player.next(),
    },
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
    display: block;
    position: relative;
    margin-bottom: 0.5rem;
    padding-bottom: 100%;
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

  .player_seriesOrPlaylist {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
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
  .player_action[disabled] {
    opacity: 0.5;
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
