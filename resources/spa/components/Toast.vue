<template>
  <dialog class="toast">
    <div class="toast_text"><slot/></div>
    <button class="toast_undo">Undo</button>
  </dialog>
</template>

<script>
  export default {
    name: "Toast"
  }
</script>

<style scoped>
  .toast {
    position: fixed;
    z-index: 20;
    right: auto;
    bottom: 1.5rem;
    left: 19rem;
    display: flex;
    border-radius: 2px;
    background-color: var(--black3);
    box-shadow: var(--shadow);
  }

  .toast_text {
    padding: 1rem;
  }

  .toast_undo {
    padding: 1rem;
    color: var(--blue5);
    font-weight: 500;
    text-transform: uppercase;
  }
  .toast_undo:hover,
  .toast_undo:focus {
    background-color: var(--blue7);
  }

  @media screen and (max-width: 1200px) {
    .toast {
      left: 1rem;
      bottom: 5rem;
    }
  }

  @media screen and (max-width: 479px) {
    .toast {
      max-width: calc(100vw - 7.5rem);
    }
  }
</style>
