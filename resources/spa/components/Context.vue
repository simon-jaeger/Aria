<template>
  <div class="context is-account">
    <RouterLink class="context_item" to="/player/settings">
      <span class="context_icon">settings</span>
      <span>Settings</span>
    </RouterLink>
    <div class="context_item">
      <span class="context_icon">power_settings_new</span>
      <span>Log out</span>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Context"
  }
</script>

<style scoped>
  .context {
    position: absolute;
    top: 100%;
    right: 0;
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
    border-radius: 4px;
    background-color: var(--black3);
    box-shadow: var(--shadow2);
    color: var(--white5);
  }
  /* TODO: use inline styles for these context variations? */
  .context.is-track {
    margin-top: -0.5rem;
  }
  .context.is-account {
    left: 1.75rem;
    right: auto;
  }

  .context_icon {
    margin-right: 1rem;
    font-family: 'Material Icons', sans-serif;
    overflow-wrap: normal;
  }

  .context_item {
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
