<template>
  <dialog class="modal">
    <div class="modal_inner">
      <header class="modal_header">
        <h2 class="modal_title">Add to...</h2>
        <button class="modal_close">close</button>
      </header>
      <div class="modal_body">
        <slot/>
      </div>
      <footer class="modal_actions">
        <button class="modal_action">+ New playlist</button>
        <button class="modal_action">Done</button>
      </footer>
    </div>
  </dialog>
</template>

<script>
  export default {
    name: "Modal"
  }
</script>

<style scoped>
  .modal {
    position: fixed;
    z-index: 30;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    display: flex;
    padding: 1rem;
    align-items: center;
    justify-content: center;
    background-color: var(--blackA);
    box-shadow: var(--shadow);
  }

  .modal_inner {
    overflow: hidden;
    width: 480px;
    border-radius: 4px;
  }

  .modal_header {
    position: relative;
    padding: 1rem 3rem 1rem 1.5rem;
    background-color: var(--black4);
  }

  .modal_title {
    font-weight: 500;
  }

  .modal_close {
    position: absolute;
    top: 0;
    right: 0;
    padding: 1rem;
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
    color: var(--white6);
  }
  .modal_close:hover,
  .modal_close:focus {
    color: var(--white5);
  }

  .modal_body {
    padding: 1rem 1.5rem;
    background-color: var(--black5);
  }

  .modal_actions {
    display: flex;
    border-top: 1px solid var(--white7);
    background-color: var(--black5);
  }

  .modal_action {
    padding: 1rem;
    flex: 1 0 0;
    text-align: center;
  }
  .modal_action:hover,
  .modal_action:focus {
    background-image: linear-gradient(0, var(--blue7), var(--blue7));
  }
  .modal_action:not(:last-child) {
    border-right: 1px solid var(--white7);
  }
</style>
