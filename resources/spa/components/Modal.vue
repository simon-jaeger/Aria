<template>
  <div @click.self="close" class="modal" :class="{'is-open': open}">
    <div class="modal_inner">
      <header class="modal_header">
        <h2 class="modal_title">{{ title }}</h2>
        <button @click="close" class="modal_close">close</button>
      </header>
      <div class="modal_body">
        <slot/>
      </div>
      <footer class="modal_actions">
        <slot name="actions" :close="close"></slot>
      </footer>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Modal",
    props: ["title", "name"],
    data() {
      return {
        open: false
      }
    },
    methods: {
      close() {
        this.open = false
      }
    },
    mounted() {
      this.$root.$on("modal-" + this.name, () => this.open = true)
    },
    watch: {
      $route() {
        this.close()
      }
    },
  }
</script>

<style scoped>
  .modal {
    visibility: hidden;
    position: fixed;
    z-index: 100;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    display: flex;
    padding: 1rem;
    align-items: center;
    justify-content: center;
    background-color: var(--blackA);
    opacity: 0;
    transition: all 0.3s;
  }
  .modal.is-open {
    visibility: visible;
    opacity: 1;
  }

  .modal_inner {
    position: relative;
    overflow: hidden;
    width: 480px;
    border-radius: 4px;
    box-shadow: var(--shadow2);
    transition: all 0.3s;
    transform: translateY(-1rem);
  }
  .modal.is-visible > .modal_inner {
    transform: translateY(0);
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
    max-height: calc(100vh - 9rem);
    overflow-y: auto;
    padding: 1.5rem;
    background-color: var(--black5);
  }

  .modal_actions {
    display: flex;
    border-top: 1px solid var(--white7);
    background-color: var(--black5);
  }
  .modal_actions:empty {
    display: none;
  }

  .modal_actions > * {
    padding: 1rem;
    flex: 1 0 0;
    text-align: center;
  }
  .modal_actions > *:hover,
  .modal_actions > *:focus {
    background-image: linear-gradient(0, var(--blue7), var(--blue7));
  }
  .modal_actions > *:not(:last-child) {
    border-right: 1px solid var(--white7);
  }
</style>
