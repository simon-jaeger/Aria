<template>
  <div @click="open = !open" @focusout="closeIfOutside($event)" class="context">
    <slot></slot>
    <div v-show="open" class="menuWrap">
      <slot name="menu"></slot>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Context",
    data() {
      return {
        open: false
      }
    },
    methods: {
      closeIfOutside(e) {
        if (!this.$el.contains(e.relatedTarget)) {
          this.open = false
        }
      },
    }
  }
</script>

<style scoped>
  .context {
    position: relative;
  }
  .context > .menuWrap > div {
    position: absolute;
    z-index: 30;
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
    border-radius: 4px;
    background-color: var(--black3);
    box-shadow: var(--shadow2);
    color: var(--white5);
  }

  .context > .menuWrap > div >>> button, a {
    width: 100%;
    display: flex;
    padding: 0.75rem 1.5rem;
  }
  .context > .menuWrap > div >>> button:hover, a:hover,
  .context > .menuWrap > div >>> button:focus, a:focus {
    background-color: var(--blue7);
  }

  .context > .menuWrap > div >>> i {
    margin-right: 1rem;
    font-family: 'Material Icons', sans-serif;
    font-style: normal;
    overflow-wrap: normal;
  }


  /* TODO: use inline styles/classes for these context variations */
  .context > .menuWrap.is-track {
    margin-top: -0.5rem;
  }
</style>
