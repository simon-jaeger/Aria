<template>
  <div class="toast" :class="{'is-open': open}">
    <div class="toast_msg">{{ msg }}</div>
    <button v-if="abort" @click="undo" class="toast_undo">Undo</button>
  </div>
</template>

<script>
  export default {
    name: "Toast",
    data() {
      return {
        open: false,
        msg: "",
        callback: null,
        abort: null,
        timeout: null,
      }
    },
    methods: {
      reset() {
        clearTimeout(this.timeout)
        this.open = false
        this.callback = null
      },
      undo() {
        this.callback = null
        this.abort()
      },
    },
    mounted() {
      // display toast on global event and run optional callback after timeout
      // during the timeout, the undo button may nullify the callback
      // and run an abort function instead
      this.$root.$on("toast", (e) => {
        // call old callback first before showing a new toast, then reset
        if (this.callback) this.callback()
        this.reset()

        this.open = true
        this.msg = e.msg
        this.callback = e.callback
        this.abort = e.abort
        this.timeout = setTimeout(() => {
          if (this.callback) this.callback()
          this.reset()
        }, 3000)
      })

      // warn user when leaving page while a callback is still pending
      window.addEventListener("beforeunload", e => {
        if (this.callback) e.returnValue = true
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
