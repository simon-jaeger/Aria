<template>
  <button class="playermini">
    <span class="playermini_close">close</span>
  </button>
</template>

<script>
  export default {
    name: "PlayerMini"
  }
</script>

<style scoped>
  .playermini {
    display: none;
  }

  @media screen and (max-width: 1224px) {
    .playermini {
      position: fixed;
      right: 0;
      bottom: 4rem;
      display: flex;
      overflow: hidden;
      width: 3.5rem;
      height: 3.5rem;
      margin: 1rem;
      justify-content: center;
      align-items: center;
      border-radius: 9999px;
      background-color: var(--black3);
      box-shadow: var(--shadow2);
    }
    .playermini_close {
      font-family: 'Material Icons', sans-serif;
      overflow-wrap: normal;
      font-size: 1.5rem;
    }
  }

</style>
