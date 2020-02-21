<template>
  <div class="app">
    <AppHeader/>
    <main class="main">
      <!-- TODO: make sure playlist etc. get updated -->
      <KeepAlive include="Series, Playlists">
        <RouterView/>
      </KeepAlive>
    </main>
    <AppPlayer/>

    <PlayerMini/>

    <Toast>Added to playlist</Toast>
  </div>
</template>

<script>
  import AppHeader from "./components/AppHeader"
  import AppPlayer from "./components/AppPlayer"
  import Toast from "./components/Toast"
  import PlayerMini from "./components/PlayerMini"

  export default {
    name: "App",
    components: {PlayerMini, Toast, AppHeader, AppPlayer}
  }
</script>

<style>
  .app {
    display: flex;
  }

  .main {
    position: relative;
    padding: 3rem;
    flex: 1;
  }

  .main_inner {
    max-width: 1200px;
    margin-right: auto;
    margin-left: auto;
  }
  .main_inner.is-box {
    max-width: 800px;
    padding: 3rem;
    border-radius: 2px;
    background-color: var(--black5);
  }

  @media screen and (max-width: 1200px) {
    .app {
      display: block;
    }

    .main {
      padding: 1.5rem 1.5rem 5.5rem;
    }
  }

  @media screen and (max-width: 479px) {
    .main_inner.is-box {
      margin-top: -1.5rem;
      margin-right: -1.5rem;
      margin-left: -1.5rem;
      padding: 1.5rem;
    }
  }


  /******************************************************************************/
  /******************************************************************************/
  /* global */
  /* TODO: extract to components.css when done? */
  /******************************************************************************/
  /******************************************************************************/

  /* utils */
  /******************************************************************************/
  /* screen reader only */
  .sr {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    border: 0;
    margin: -1px;
    clip: rect(0, 0, 0, 0);
    overflow: hidden;
  }

  /* form */
  /******************************************************************************/
  .form {
    display: grid;
    grid-gap: 1.5rem;
  }

  /* input */
  /******************************************************************************/
  .input {
  }
  .input.is-search {
    display: flex;
    align-items: center;
    margin-right: 1rem;
    margin-bottom: 0.5rem;
    margin-left: 1rem;
  }

  .input_label {
    margin-bottom: 0.25rem;
    color: var(--white6);
  }

  .input_field {
    width: 100%;
    padding: 0.75rem 1rem;
    border-style: solid;
    border-width: 1px;
    border-color: var(--white7);
    border-radius: 2px;
    background-color: var(--black4);
  }
  .input_field.is-search {
    padding-left: 3rem;
    border-radius: 999px;
  }
  .input_field:focus {
    border-color: var(--blue5);
  }

  .input_searchicon {
    position: absolute;
    margin: 0 1rem;
    opacity: 0.5;
    font-family: 'Material Icons', sans-serif;
    color: var(--white5);
    pointer-events: none;
    user-select: none;
  }

  @media screen and (max-width: 1200px) {
    .input.is-search {
      min-width: 12rem;
      margin-right: 0;
      margin-bottom: 0;
    }

    .input_field.is-search {
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
    }
  }

  @media screen and (max-width: 479px) {
    .input.is-search {
      display: none;
    }
  }

  /* checks, check */
  /******************************************************************************/
  .checks {
    display: grid;
    grid-gap: 0.5rem;
  }

  .check {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
  }

  /* hide native checkbox visually but not for screen readers */
  .check > input[type="checkbox"] {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    border: 0;
    margin: -1px;
    clip: rect(0, 0, 0, 0);
    overflow: hidden;
  }

  .check_label {
    position: relative;
    padding-left: 2rem;
  }
  .check_label::before {
    content: 'check_box_outline_blank';
    position: absolute;
    left: 0;
    font-family: 'Material Icons', sans-serif;
    word-wrap: normal;
    color: var(--white6);
  }
  /* sync state of native checkbox with custom checkbox */
  input[type="checkbox"]:checked + .check_label::before {
    content: 'check_box';
    color: var(--blue5);
  }

  /* button */
  /******************************************************************************/
  .button {
    display: flex;
    padding: 0.75rem 1.5rem;
    align-items: center;
    border-radius: 2px;
    background-color: var(--blue6);
    font-weight: 500;
    text-transform: uppercase;
  }
  .button.is-secondary {
    background-color: var(--black3);
  }
  .button.is-icon {
    padding-right: 0.75rem;
    padding-left: 0.75rem;
  }
  .button:hover,
  .button:focus {
    filter: brightness(115%);
  }

  .button_icon {
    margin-right: 0.5rem;
    font-family: 'Material Icons', sans-serif;
    word-wrap: normal;
    font-weight: 400;
    text-transform: none;
  }
  .button_icon.is-alone {
    width: 1.5rem;
    margin-right: 0;
    text-align: center;
  }

  /* alert */
  /******************************************************************************/
  .alert {
    position: relative;
    padding: 1rem 3.5rem 1rem 1rem;
    background-color: var(--white7);
  }
  .alert::before {
    content: '';
    display: block;
    position: absolute;
    top: 50%;
    right: 1rem;
    transform: translate(0px, -50%);
    font-family: 'Material Icons', sans-serif;
    word-wrap: normal;
    color: var(--white6);
    font-size: 1.5rem;
    line-height: 1;
  }
  .alert.is-error {
    background-color: var(--red6);
  }
  .alert.is-error::before {
    content: 'error_outline';
  }

  @media screen and (max-width: 479px) {
    .alert {
      padding-right: 1rem;
    }
    .alert::before {
      position: static;
      margin-bottom: 1rem;
      transform: none;
      text-align: center;
    }
  }

  /* mobilesearch */
  /******************************************************************************/
  .mobilesearch {
    display: none;
    font-family: 'Material Icons', sans-serif;
    word-wrap: normal;
  }

  @media screen and (max-width: 479px) {
    .mobilesearch {
      display: block;
      padding: 1rem;
      color: var(--white6);
      font-size: 1.5rem;
      line-height: 1;
    }
    .mobilesearch:hover,
    .mobilesearch:focus {
      color: var(--white5);
    }
  }
</style>
