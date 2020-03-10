<template>
  <div class="equalizer" :class="{'is-playing': playing}">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </div>
</template>

<script>
  export default {
    name: "Equalizer",
    props: {playing: Boolean}
  }
</script>

<style scoped>
  .equalizer {
    width: 24px;
    height: 24px;
    padding: 4px;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
  }

  .bar {
    width: 4px;
    height: 1px;
    background-color: var(--white5);
  }
  .bar:nth-child(1) {
    animation-duration: 0.4s;
  }
  .bar:nth-child(2) {
    animation-duration: 0.5s;
  }
  .bar:nth-child(3) {
    animation-duration: 0.3s;
  }
  .equalizer.is-playing > .bar {
    animation-name: ani;
    animation-iteration-count: infinite;
    animation-direction: alternate;
  }

  @keyframes ani {
    0% {
      height: 4px;
    }
    100% {
      height: 12px;
    }
  }
</style>
