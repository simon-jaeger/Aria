<template>
  <div class="main_inner is-box">
    <h2>History</h2>
    <ul>
      <li>Playing the Moon</li>
      <li>Prelude</li>
      <li>Facing myself</li>
    </ul>

    <Modal>
      <div class="checks">
        <div class="check">
          <input type="checkbox" checked id="1" name="fantasy-and-rpgs">
          <label for="1" class="check_label">Fantasy and RPGs</label>
        </div>
        <div class="check">
          <input type="checkbox" id="2" name="fantasy-and-rpgs">
          <label for="2" class="check_label">Weekend Playlist</label>
        </div>
        <div class="check">
          <input type="checkbox" id="3" name="fantasy-and-rpgs">
          <label for="3" class="check_label">Relaxing Tracks</label>
        </div>
      </div>
    </Modal>
  </div>
</template>

<script>
  import Modal from "../components/Modal"
  export default {
    name: "History",
    components: {Modal}
  }
</script>

<style scoped>

</style>
