<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full">
            <div v-if="listing.images.length" class="grid grid-cols-2 gap-1">
                <img v-for="image in listing.images" :key="image.id" :src="image.src" alt="image" class="w-full h-48 object-cover">
            </div>
            <div v-else class="w-full text-center font-medium text-gray-500">No images</div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>
                    Basic Info
                </template>
                <Price :price="listing.price" class="text-2xl font-bold"/>
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-gray-500"/>
            </Box>
            <Box>
                <template #header>
                    Monthly Payment
                </template>
                <MonthlyPayment :listing="listing"/>
            </Box>
        </div>
    </div>
</template>

<script setup>
    import ListingAddress from "@/Components/UI/ListingAddress.vue";
    import ListingSpace from "@/Components/UI/ListingSpace.vue";
    import Price from "@/Components/UI/Price.vue";
    import Box from "@/Components/UI/Box.vue";
    import MonthlyPayment from "@/Components/UI/MonthlyPayment.vue";

    const props = defineProps({
        listing: Object,
    });
</script>

<style scoped>

</style>
