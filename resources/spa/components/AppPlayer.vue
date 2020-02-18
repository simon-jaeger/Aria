<template>
  <aside class="player">
    <!-- TODO: make dynamic -->
    <div class="player_track">
      <div class="player_info">
        <div class="player_title">Bolero of Fire</div>
        <div class="player_sub">Zelda • 04:50 / 06:06</div>
      </div>
    </div>

    <div class="player_progress">
      <span class="player_progressfill"></span>
      <span class="player_progressempty"></span>
    </div>

    <div class="player_actions">
      <button class="player_action">repeat</button>
      <button class="player_action">skip_previous</button>
      <button class="player_action is-big">play_circle_filled</button>
      <button class="player_action">skip_next</button>
      <button class="player_action">more_vert</button>
    </div>
  </aside>
</template>

<script>
  export default {
    name: "AppPlayer"
  }
</script>

<style>
  .player {
    width: 320px;
    height: 100vh;
    position: sticky;
    top: 0;
    padding: 3rem 1.5rem 1.5rem;
    background-color: var(--black5);
  }

  .player_track {
    position: relative;
    margin-bottom: 0.5rem;
    padding-bottom: 100%;
    background-image: url('/storage/covers/zelda-the-legend-of.jpg');
    background-size: cover;
  }

  .player_cover {
    width: 100%;
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
  }

  .player_sub {
    margin-right: 1.5rem;
    color: var(--white6);
    font-size: 0.875rem;
  }

  .player_progress {
    display: flex;
    height: 3rem;
    align-items: center;
    cursor: pointer;
  }

  .player_progressfill {
    width: 75%;
    height: 4px;
    flex: 0 0 auto;
    background-color: var(--blue5);
  }

  .player_progressempty {
    width: 75%;
    height: 4px;
    flex: 1;
    background-color: var(--white7);
  }

  .player_actions {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .player_action {
    padding: 0.75rem;
    font-family: 'Material Icons', sans-serif;
    word-wrap: normal;
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

  @media screen and (max-width: 1200px) {
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
