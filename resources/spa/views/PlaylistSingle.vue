<template>
  <div class="main_inner is-box" v-if="playlist">
    <div class="set">
      <div class="set_cover"></div>
      <div class="set_info">
        <h1 class="set_title">{{ playlist.title }}</h1>
        <small class="set_sub">
          {{ playlist.tracks.length }} Tracks &nbsp;•&nbsp;
          {{ playlist.tracks | map(x => x.duration) | sum | duration }}
        </small>
        <div class="set_actions">
          <button class="button">
            <span class="button_icon">play_arrow<br></span>
            <span>Play</span>
          </button>
          <button class="button is-secondary is-icon">
            <span class="button_icon is-alone">more_vert</span>
          </button>
        </div>
      </div>
    </div>

    <div class="tracks">
      <div class="track is-header">
        <div class="track_cell is-m1">#</div>
        <div class="track_cell is-m2 is-m10">Title</div>
        <div class="track_cell is-m3 is-m20">access_time</div>
        <div class="track_cell is-m4"></div>
      </div>
      <div class="track" v-for="track in playlist.tracks" :key="track.id">
        <div class="track_cell is-m1">{{ track.order | zeroPad }}</div>
        <div class="track_cell is-m2">{{ track.title }}</div>
        <div class="track_cell is-m3">{{ track.duration | duration }}</div>
        <button class="track_cell is-m4">more_vert</button>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "PlaylistSingle",
    data() {
      return {
        playlist: this.$root.playlistsCache[this.$route.params.slug],
      }
    },
    created() {
      axios.get("/api/playlists/" + this.$route.params.slug)
        .then(({data}) => {
          this.playlist = data
          this.$root.playlistsCache[data.slug] = data // cache data
        })
    }
  }
</script>

<style>
  /* TODO: maybe extract set and tracks? */

  .set {
    display: flex;
    margin-bottom: 3rem;
    align-items: center;
  }

  .set_cover {
    width: 10rem;
    height: 10rem;
    margin-right: 1.5rem;
    background-color: var(--white7);
  }

  .set_info {
    flex: 1;
  }

  .set_title {
    margin-bottom: 0.5rem;
    font-size: 1.5rem;
    line-height: 1;
    font-weight: 700;
  }

  .set_sub {
    margin-bottom: 1rem;
    color: var(--white6);
  }

  .set_actions {
    display: grid;
    justify-content: start;
    grid-auto-flow: column;
    grid-gap: 1rem;
  }

  @media screen and (max-width: 480px) {
    .set {
      display: block;
    }

    .set_cover {
      width: 100vw;
      height: 12rem;
      max-width: none;
      margin-top: -1.5rem;
      margin-bottom: 1.5rem;
      margin-left: -1.5rem;
      object-fit: cover;
      object-position: 50% 0%;
    }

    .set_actions {
      grid-template-columns: auto auto;
    }
  }

  .track {
    position: relative;
    display: flex;
    padding-left: 4px;
    border-bottom: 1px solid var(--white7);
  }
  .track:hover,
  .track:focus {
    background-color: var(--blue7);
    cursor: pointer;
  }
  .track.is-active {
    background-color: var(--blue7);
    box-shadow: inset 4px 0 0 0 var(--blue5);
  }
  .track.is-header:hover,
  .track.is-header:focus {
    background-color: transparent;
    cursor: default;
  }

  .track_cell {
    padding: 1rem 0.5rem;
    color: var(--white6);
    text-align: center;
  }
  .track_cell.is-m1 {
    width: 2.5rem;
  }
  .track_cell.is-m2 {
    flex: 1 0 0;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    color: var(--white5);
    text-align: left;
  }
  .track_cell.is-m3 {
    width: 5rem;
  }
  .track_cell.is-m4 {
    width: 2.5rem;
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
  }
  .track_cell.is-m4:hover,
  .track_cell.is-m4:focus {
    color: var(--white5);
  }
  .track_cell.is-m10 {
    color: var(--white6);
    cursor: default;
  }
  .track_cell.is-m20 {
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
  }
  .track_cell.is-m30 {
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
  }

  @media screen and (max-width: 480px) {
    .track {
      padding-right: 3rem;
      flex-wrap: wrap;
    }
    .track_cell.is-m1 {
      display: none;
    }
    .track_cell.is-m2 {
      padding: 0.5rem 0 0 0.75rem;
      flex: 1 0 100%;
    }
    .track_cell.is-m3 {
      width: auto;
      padding-top: 0.25rem;
      padding-bottom: 0.5rem;
      padding-left: 0.75rem;
      font-size: 0.875rem;
    }
    .track_cell.is-m4 {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .track_cell.is-m10 {
      display: none;
    }
    .track_cell.is-m20 {
      display: none;
    }
  }
</style>
