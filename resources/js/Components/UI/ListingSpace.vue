<template>
    <div>
        <span class="font-bold">
            {{listing.beds}} beds<span class="text-gray-400 mx-1">|</span>
        </span>
        <span class="font-bold">
            {{listing.baths}} baths<span class="text-gray-400 mx-1">|</span>
        </span>
        <span class="font-bold">
            {{listing.area}} m²
        </span>

    </div>
</template>

<script setup>
    defineProps({
        listing: Object,
    })
</script>

<style scoped>

</style>
