<template>
  <Link href="/">Main Page  </Link>
  <Link href="/hello">Show Page  </Link>

  <div>The timer is: {{ timer }}</div>

  <slot />
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3'
import {ref} from 'vue'

const timer = ref(0)
setInterval(() => {
  timer.value++
}, 1000)
</script>

<style scoped>

</style>
