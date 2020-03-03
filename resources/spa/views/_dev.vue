<!-- TODO: rm dev route component -->
<template>
  <div class="main_inner is-box">
    <h1>dev</h1>

    <Context>
      <button>context</button>
      <template v-slot:menu>
        <RouterLink class="context_item" to="/player/settings">
          <i class="context_icon">settings</i>
          <span>Settings</span>
        </RouterLink>
        <button class="context_item" @click="foo">
          <i class="context_icon">power_settings_new</i>
          <span>Log out</span>
        </button>
      </template>
    </Context>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>
</template>

<script>
  import Context from "../components/Context"

  export default {
    components: {Context},
    methods: {
      foo() {
        console.log("foo")
      },
    }
  }
</script>

<style scoped>

</style>
