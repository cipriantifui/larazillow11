<template>

    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">Listings</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-200 font-medium">
                    <Link :href="route('listing.index')">LaraZillow</Link>
                </div>
                <div class="flex items-center gap-4" v-if="user">
                    <Link class="text-sm text-gray-500" :href="route('realtor.listing.index')"> {{user.name}} </Link>
                    <Link :href="route('realtor.listing.create')" class="btn-primary">+ New Listing</Link>
                    <div><Link :href="route('logout')" method="delete" as="button">Logout</Link></div>
                </div>
                <div v-else class="flex items-center gap-2">
                    <Link :href="route('user-account.create')">Register</Link>
                    <Link :href="route('login')">Sing-in</Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 w-full">
        <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-gray-800 bg-green-50 dark:bg-green-900 p-2 text-green-900 dark:text-white font-medium">
            {{ flashSuccess }}
        </div>

        <slot />
    </main>
</template>

<script setup>
import {computed} from "vue";
import {Link, usePage} from '@inertiajs/inertia-vue3'
// page props are available in the setup function

const page = usePage();
const flashSuccess = computed(() => page.props.value.flash.success);
const user = computed(() => page.props.value.user);
</script>

<style scoped>

</style>
