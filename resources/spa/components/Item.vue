<template>
  <RouterLink class="item" to="/player/series/ar-tonelico">
    <div class="item_cover"></div>
    <div class="item_body">
      <h2 class="item_title">{{ data }}</h2>
      <small class="item_sub">32 Tracks</small>
      <button @click.prevent="foo" class="item_action is-hearted">favorite</button>
    </div>
  </RouterLink>
</template>

<script>
  export default {
    name: "Item",
    props: ["data"],
    methods: {
      foo() {
        alert("heart clicked")
      }
    }
  }
</script>

<style scoped>
  .item {
    overflow: hidden;
    border-radius: 2px;
    background-color: var(--black5);
    box-shadow: 1px 1px 2px 0 rgba(0, 0, 0, 0.24), 0 1px 3px 0 rgba(0, 0, 0, 0.12);
  }

  .item_cover {
    width: 100%;
    padding-bottom: 100%;
    background-image: url('/storage/covers/ar-tonelico.jpg');
    background-size: cover;
  }

  .item_body {
    position: relative;
    padding: 1rem 3rem 1rem 1rem;
    flex: 1;
  }

  .item_title {
    margin-bottom: 0.25rem;
    font-weight: 700;
  }

  .item_sub {
    color: var(--white6);
    font-size: 0.875rem;
  }

  .item_action {
    position: absolute;
    top: 0;
    right: 0;
    padding: 1rem;
    font-family: 'Material Icons', sans-serif;
    word-wrap: normal;
    color: var(--white6);
    font-weight: 400;
  }
  .item_action.is-hearted {
    color: var(--pink5);
  }
  .item_action:hover,
  .item_action:focus {
    color: var(--white5);
  }

  @media screen and (max-width: 479px) {
    .item {
      display: flex;
    }
    .item_cover {
      width: 5rem;
      padding-bottom: 0;
      object-fit: cover;
    }
  }
</style>
