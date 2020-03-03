<template>
  <dialog class="wrap">
    <slot></slot>
    <div class="context" @click="blur">
      <slot name="menu"></slot>
    </div>
  </dialog>
</template>

<script>
  export default {
    name: "Context",
    methods: {
      blur() {
        document.activeElement.blur()
      },
    }
  }
</script>

<style scoped>
  .context {
    visibility: hidden;
    position: absolute;
    /*top: 100%;*/
    /*right: 0;*/
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
    border-radius: 4px;
    background-color: var(--black3);
    box-shadow: var(--shadow2);
    color: var(--white5);
  }
  .wrap {
    display: contents;
  }
  .wrap:focus-within > .context {
    visibility: visible;
  }
  /* TODO: use inline styles for these context variations? */
  .context.is-track {
    margin-top: -0.5rem;
  }
  .context.is-account {
    left: 1.75rem;
    right: auto;
  }

  >>> .context_icon {
    margin-right: 1rem;
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
  }

  .context_item {
    width: 100%;
    display: flex;
    padding: 0.75rem 1.5rem;
  }
  .context_item:hover,
  .context_item:focus {
    background-color: var(--blue7);
  }

  @media screen and (max-width: 1224px) {
    .context {
      display: none;
    }
  }

  @media screen and (max-width: 480px) {
    .context.is-account {
      left: auto;
      right: 0;
      margin-top: -0.25rem;
    }
  }
</style>
