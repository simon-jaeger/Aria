<template>
  <div class="loading"></div>
</template>

<script>
  export default {
    name: "Loading"
  }
</script>

<style scoped>
  .loading {
    width: 2rem;
    height: 2rem;
    border: 4px solid var(--white7);
    border-radius: 50%;
    border-top-color: transparent;
    position: fixed;
    top: 50%;
    left: 50%;
    animation: spin 1s linear infinite;
  }
  @keyframes spin {
    0% {
      transform: translate(-50%, -50%) rotate(0);
    }
    100% {
      transform: translate(-50%, -50%) rotate(360deg);
    }
  }
</style>
