<template>
    <div class="border border-gray-300 dark:border-gray-800 bg-white dark:bg-gray-800 p-4 rounded-md shadow-md dark:text-gray-300">
        <div class="text-gray-500 font-medium">
            <slot name="header"></slot>
        </div>
        <slot />
    </div>
</template>

<script setup>

</script>

<style scoped>

</style>
