<script setup>
const props = defineProps(['title', 'content', 'id'])
</script>
<template>
  <section :id="id">
    <h2 class="text-3xl my-5">{{ title }}</h2>
    <p class="text-xl" v-html="content"/>
  </section>
</template>
