<template>
  <div class="toast" :class="{'is-open': open}">
    <div class="toast_msg">{{ msg }}</div>
    <!-- TODO: undo aborts delayed backend sync with cleartimeout? -->
    <button v-if="undo" @click="close" class="toast_undo">Undo</button>
  </div>
</template>

<script>
  export default {
    name: "Toast",
    data() {
      return {
        open: false,
        msg: "",
        undo: null,
        timeout: null,
      }
    },
    methods: {
      close() {
        this.open = false
        this.undo = null
        clearTimeout(this.timeout)
      }
    },
    mounted() {
      this.$root.$on("toast", (e) => {
        this.close()
        this.open = true
        this.msg = e.msg
        this.undo = e.undo
        this.timeout = setTimeout(() => this.close(), 3000)
      })
    },
  }
</script>

<style scoped>
  .toast {
    position: fixed;
    z-index: 5;
    right: auto;
    bottom: 1rem;
    left: 16rem;
    margin-right: 256px;
    display: flex;
    border-radius: 2px;
    background-color: var(--black3);
    box-shadow: var(--shadow2);
    transition: all 0.4s;
    visibility: hidden;
    transform: translateY(calc(100% + 2rem));
  }
  .toast.is-open {
    visibility: visible;
    transform: translateY(0);
  }

  .toast_msg {
    padding: 1rem;
  }

  .toast_undo {
    padding: 1rem;
    color: var(--blue5);
    font-weight: 500;
    text-transform: uppercase;
  }
  .toast_undo:hover,
  .toast_undo:focus {
    background-color: var(--blue7);
  }

  @media screen and (max-width: 1224px) {
    .toast {
      left: 1rem;
      bottom: 5rem;
      margin-right: 5.5rem;
    }
  }
</style>
