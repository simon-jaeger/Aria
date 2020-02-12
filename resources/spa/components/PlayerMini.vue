<template>
  <button class="playermini" :class="{'is-open': open}">
    <span class="playermini_cover" :class="{'is-playing': playing}"
          :style="{backgroundImage: `url('${cover}')`}"></span>
    <span class="playermini_close">close</span>
  </button>
</template>

<script>
  export default {
    name: "PlayerMini",
    props: ["open", "playing", "cover"]
  }
</script>

<style scoped>
  .playermini {
    display: none;
  }

  @media screen and (max-width: 1224px) {
    .playermini {
      display: block;
      position: fixed;
      right: 0;
      bottom: 4rem;
      width: 3.5rem;
      height: 3.5rem;
      margin: 1rem;
      user-select: none;
      animation: move-in 0.4s;
      transition: transform 0.5s;
      transform-style: preserve-3d;
    }
    .playermini.is-open {
      transform: rotateY(180deg);
    }
    @keyframes move-in {
      0% {
        right: -5rem;
      }
    }

    .playermini_cover {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      border-radius: 9999px;
      background-size: cover;
      box-shadow: var(--shadow2);
      filter: grayscale(100%);
      backface-visibility: hidden;
    }
    .playermini_cover.is-playing:not(.is-open) {
      filter: grayscale(0);
    }

    .playermini_close {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 9999px;
      font-family: 'Material Icons', sans-serif;
      overflow-wrap: normal;
      font-size: 1.5rem;
      background-color: var(--black3);
      box-shadow: var(--shadow2);

      transform: rotateY(180deg);
      backface-visibility: hidden;
    }
  }

</style>
