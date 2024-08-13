<template>
    <h1 class="text-3xl mb-4">Your Listings</h1>
    <section>
        <RealtorFilters />
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box v-for="listing in listings" :key="listing.id">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-2">
                <div>
                    <div class="xl:flex items-center gap-2">
                        <Price :price="listing.price" class="text-2xl font-medium"></Price>
                        <ListingSpace :listing="listing"></ListingSpace>
                    </div>
                    <ListingAddress :listing="listing" class="text-gray-500"></ListingAddress>
                </div>
                <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                    <Link :href="route('listing.show', listing.id)" class="btn-outline text-xs font-medium">Preview</Link>
                    <Link :href="route('listing.edit', listing.id)" class="btn-outline text-xs font-medium">Edit</Link>
                    <Link :href="route('realtor.listing.destroy', listing.id)" class="btn-outline text-xs font-medium" method="delete" as="button">Delete</Link>
                </div>
            </div>
        </Box>
    </section>
</template>

<script setup>
    import Box from "@/Components/UI/Box.vue";
    import Price from "@/Components/UI/Price.vue";
    import ListingSpace from "@/Components/UI/ListingSpace.vue";
    import ListingAddress from "@/Components/UI/ListingAddress.vue";
    import {Link} from "@inertiajs/inertia-vue3";
    import RealtorFilters from "@/Pages/Realtor/Index/Components/RealtorFilters.vue";

    defineProps({listings: Object});
</script>

