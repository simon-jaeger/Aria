<!-- TODO: rm dev route component -->
<template>
  <div class="main_inner is-box">
    <h1>dev</h1>

    <Context>
      <button>context</button>
      <template v-slot:menu>
        <div>
          <RouterLink to="/player/settings">
            <i>settings</i>
            <span>Settings</span>
          </RouterLink>
          <button>
            <i>power_settings_new</i>
            <span>Log out</span>
          </button>
        </div>
      </template>
    </Context>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>
</template>

<script>
  import Context from "../components/Context"

  export default {
    components: {Context}
  }
</script>

<style scoped>

</style>
