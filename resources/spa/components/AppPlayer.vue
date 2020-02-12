<template>
  <div style="display:contents;" v-click-outside="close">
    <aside class="player"
           :class="{'is-open': open}"
    >
      <template v-if="track">
        <RouterLink :to="link"
                    @click.native="close"
                    class="player_track"
                    :style="{backgroundImage: `url('${cover}')`}">
          <div class="player_info">
            <h2 class="player_title">{{ track.title }}</h2>
            <div class="player_sub">
              <h3 class="player_seriesOrPlaylist">
                {{ seriesOrPlaylist.title }}
              </h3>
              <time>
                {{ currentTime | duration }} / {{ duration | duration }}
              </time>
            </div>
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

      <template v-else>
        <div class="player_noTrack">music_note</div>
      </template>
    </aside>

    <PlayerMini v-if="track"
                @click.native="open = !open"
                :open="open"
                :cover="cover"
                :playing="playing"/>
  </div>
</template>

<script>
  import PlayerMini from "./PlayerMini"

  export default {
    name: "AppPlayer",
    components: {PlayerMini},
    data() {
      return {
        open: false
      }
    },
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
      close() {
        this.open = false
      },
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

  .player_noTrack {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 13rem;
    padding: 1rem;
    border: 1px solid var(--white7);
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
    font-size: 2rem;
    color: var(--white7);
    user-select: none;
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
    padding: 1rem;
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
      /* screen height minus fixed elements like controls, header and nav */
      --trackSpace: calc(100vh - 18rem);
      /* full width minus some margin on the sides */
      --trackSpaceLimit: calc(100vw - 4rem);

      position: fixed;
      left: 0;
      top: 4rem;
      right: 0;
      bottom: 4rem;
      width: auto;
      height: auto;
      padding: 1rem 0;
      border-top: 1px solid var(--white7);
      transform: translateX(110%);
      transition: transform 0.3s;
    }
    .player.is-open {
      transform: translateX(0);
    }

    .player_track {
      padding-bottom: 0;
      height: var(--trackSpace);
      max-height: var(--trackSpaceLimit);
      width: var(--trackSpace);
      max-width: var(--trackSpaceLimit);
      margin-right: auto;
      margin-left: auto;
    }

    .player_progress {
      width: var(--trackSpace);
      max-width: var(--trackSpaceLimit);
      margin-right: auto;
      margin-left: auto;
    }

    .player_actions {
      margin-right: auto;
      margin-left: auto;
    }

    .player_action.is-big {
      font-size: 4rem;
    }
  }
</style>
