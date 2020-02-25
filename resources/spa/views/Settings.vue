<template>
  <div class="main_inner is-box">
    <form class="form">
      <div class="alert is-error">
        Choose a password with at least 6 characters
      </div>

      <div class="input">
        <label for="email" class="input_label">Email</label>
        <input type="text"
               id="email"
               class="input_field"
               value="simon.pascal.jaeger@gmail.com">
      </div>

      <div class="input">
        <!-- TODO: password component? -->
        <label for="newPassword" class="input_label">New password</label>
        <div style="display: grid; grid-template-columns: 1fr auto;">
          <input type="password" id="newPassword" class="input_field">
          <button class="button is-secondary is-icon">
            <span class="button_icon is-alone">visibility</span>
          </button>
        </div>
      </div>

      <button class="button" style="justify-self: end;">Save</button>
    </form>
  </div>
</template>

<script>
  export default {
    name: "Settings"
  }
</script>

<style scoped>

</style>
