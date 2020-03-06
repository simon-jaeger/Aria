<template>
  <div class="main_inner is-box">
    <header class="header">
      <div class="info">
        <h1>History</h1>
        <small class="sub">
          {{ history.length }} Tracks
        </small>
        <button @click="clearHistory" class="button is-secondary">
          <i class="button_icon">delete_sweep</i>
          <span>Clear history</span>
        </button>
      </div>
    </header>

    <Tracks :tracks="history" :numbered="false" v-if="history.length"/>
  </div>
</template>

<script>
  import Modal from "../components/Modal"
  import Tracks from "../components/Tracks"
  import Vue from "vue"

  export default {
    name: "History",
    components: {Tracks, Modal},
    computed: {
      history:() => store.history,
    },
    methods:{
      clearHistory() {
        store.clearHistory()
      },
    }
  }
</script>

<style scoped>
  .header:not(:last-child) {
    margin-bottom: 3rem;
  }
  .sub {
    margin-top: -0.5rem;
    margin-bottom: 1rem;
    color: var(--white6);
  }
</style>
