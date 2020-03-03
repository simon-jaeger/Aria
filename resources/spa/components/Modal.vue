<template>
  <div class="modal" :class="{'is-visible': visible}">
    <button @click="$emit('close')" class="modal_cancel"></button>
    <div class="modal_inner">
      <header class="modal_header">
        <h2 class="modal_title">{{ title }}</h2>
        <button @click="$emit('close')" class="modal_close">close</button>
      </header>
      <div class="modal_body">
        <slot/>
      </div>
      <footer class="modal_actions">
        <slot name="actions"></slot>
      </footer>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Modal",
    props: {title: String, visible: {type: Boolean, default: false}}
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
    box-shadow: var(--shadow2);
    transition: all 0.3s;
    opacity: 0;
  }
  .modal.is-visible {
    visibility: visible;
    opacity: 1;
  }

  .modal_cancel {
    position: absolute;
    width: 100%;
    height: 100%;
    cursor: default;
  }

  .modal_inner {
    position: relative;
    overflow: hidden;
    width: 480px;
    border-radius: 4px;
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
    padding: 1rem 1.5rem;
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
