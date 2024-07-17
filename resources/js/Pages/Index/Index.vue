<template>
  <div>
    <h1>Index</h1>
  </div>
  <Link href="/hello">Show Page </Link>
  <Link href="/listing">Listings </Link>
  <div>
    The message is: {{ message }}
  </div>
</template>
<script setup>
import {Link} from '@inertiajs/inertia-vue3'
defineProps({message: String})
</script>

<style scoped>

</style>
