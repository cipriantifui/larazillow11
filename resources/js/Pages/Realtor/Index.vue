<template>
    <h1 class="text-3xl mb-4">Your Listings</h1>
    <section>
        <RealtorFilters :filters="filters"/>
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box v-for="listing in listings.data" :key="listing.id" :class="{'border-dashed': listing.deleted_at}">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-2">
                <div :class="{'opacity-25': listing.deleted_at}">
                    <div class="xl:flex items-center gap-2">
                        <Price :price="listing.price" class="text-2xl font-medium"></Price>
                        <ListingSpace :listing="listing"></ListingSpace>
                    </div>
                    <ListingAddress :listing="listing" class="text-gray-500"></ListingAddress>
                </div>
                <section>
                    <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                        <a :href="route('listing.show', listing.id)"
                           target="_blank"
                           class="btn-outline text-xs font-medium">Preview</a>
                        <Link :href="route('realtor.listing.edit', listing.id)" class="btn-outline text-xs font-medium">Edit</Link>

                        <Link v-if="listing.deleted_at"
                              :href="route('realtor.listing.restore', listing.id)"
                              class="btn-outline text-xs font-medium"
                              method="put" as="button">Restore</Link>
                        <Link v-else
                              :href="route('realtor.listing.destroy', listing.id)"
                              class="btn-outline text-xs font-medium"
                              method="delete" as="button">Delete</Link>
                    </div>
                    <div class="mt-2">
                        <Link :href="route('realtor.listing.image.create', listing.id)"
                              class="btn-outline text-xs font-medium block w-full text-center">
                            Images ({{ listing.images_count }})
                        </Link>
                    </div>
                </section>
            </div>
        </Box>
    </section>
    <section v-if="listings.data.length" class="w-full flex justify-center my-4">
        <Pagination :links="listings.links"/>
    </section>
</template>

<script setup>
    import Box from "@/Components/UI/Box.vue";
    import Price from "@/Components/UI/Price.vue";
    import ListingSpace from "@/Components/UI/ListingSpace.vue";
    import ListingAddress from "@/Components/UI/ListingAddress.vue";
    import {Link} from "@inertiajs/inertia-vue3";
    import RealtorFilters from "@/Pages/Realtor/Index/Components/RealtorFilters.vue";
    import Pagination from "@/Components/UI/Pagination.vue";

    defineProps({
        listings: Object,
        filters: Object
    });
</script>

