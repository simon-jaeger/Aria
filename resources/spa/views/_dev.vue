<!-- TODO: rm dev route component -->
<template>
  <div class="main_inner is-box">
    <h1>dev</h1>

    <Equalizer playing/>
    <Equalizer/>

    <div style="height: 2rem;"></div>

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

    <div style="height: 2rem;"></div>

    <button @click="$root.$emit('modal-playlists-add')">modal</button>

    <div style="height: 2rem;"></div>

    <Modal title="foo" name="foo">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </Modal>
    <button @click="$root.$emit('modal-foo')">foo</button>
  </div>
</template>

<script>
  import Context from "../components/Context"
  import Modal from "../components/Modal"
  import Equalizer from "../components/Equalizer"

  export default {
    components: {Equalizer, Modal, Context}
  }
</script>

<style scoped>

</style>
