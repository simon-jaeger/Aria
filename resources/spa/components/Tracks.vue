<!-- TODO: wip, add functionality -->
<template>
  <ol class="_">
    <li class="track is-header">
      <span class="track_cell is-m1" v-if="numbered">#</span>
      <span class="track_cell is-m2 is-m10">Title</span>
      <span class="track_cell is-m3 is-m20">access_time</span>
      <span class="track_cell is-m4"></span>
    </li>
    <li class="track"
        :class="{'is-active': track === currentTrack}"
        v-for="(track, i) in tracks"
        :key="track.id">
      <button @click="$emit('selection', track)"
              style="display: contents;">
        <span class="track_cell is-m1"
              v-if="numbered">
          <Equalizer v-if="track === currentTrack" :playing="playing"/>
          <span v-else>{{ ++i | zeroPad }}</span>
        </span>
        <span class="track_cell is-m2">{{ track.title }}</span>
        <span class="track_cell is-m3">{{ track.duration | duration }}</span>
      </button>
      <button class="track_cell is-m4">more_vert</button>
    </li>
  </ol>
</template>

<script>
  import Equalizer from "./Equalizer"

  export default {
    name: "Tracks",
    components: {Equalizer},
    props: {
      numbered: {type: Boolean, default: true},
      tracks: Array,
      currentTrack: Object,
      playing: Boolean,
    },
  }
</script>

<style scoped>
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
      padding-right: 2.5rem;
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
      width: 100%;
      padding-top: 0.25rem;
      padding-bottom: 0.5rem;
      padding-left: 0.75rem;
      font-size: 0.875rem;
      text-align: left;
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
