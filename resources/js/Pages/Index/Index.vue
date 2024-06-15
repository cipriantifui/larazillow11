<template>
   <div>
        <h1>Index</h1>
    </div>
    <Link href="/hello">Show Page</Link>
    <div>
        The message is: {{ message }}
    </div>
</template>
<script setup>
    import {Link} from '@inertiajs/vue3';
    defineProps(['message']);
</script>
<style scoped>

</style>
