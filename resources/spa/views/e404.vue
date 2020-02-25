<template>
  <div class="main_inner is-box" style="text-align:center;">
    <h1 style="padding: 4rem 0;">Nothing found, sorry!</h1>
    <a href="#"
       @click="$router.go(-1)"
       class="button"
       style="display:inline-block;">Go back</a>
  </div>
</template>

<script>
  export default {
    name: "e404"
  }
</script>
