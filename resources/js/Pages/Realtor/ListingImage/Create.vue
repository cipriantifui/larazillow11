<template>
    <Box>
        <template #header> Upload images </template>
        <form @submit.prevent="upload">
            <section class="flex items-center gap-2 my-4">
                <input type="file"
                       class="border rounded-md file:px-4 file:py-2 border-gray-200 dark:border-gray-700 file:text-gray-700 file:dark:text-gray-400 file:bg-gray-100 file:dark:bg-gray-800 file:font-medium file:hover:border-gray-200 file:dark:hover:bg-gray-700"
                       multiple @input="addFiles" >
                <button type="submit" class="btn-outline disabled:opacity-25 disabled:cursor-not-allowed" :disabled="canUpload === false">Upload</button>
                <button type="reset" class="btn-outline" @click="reset">Reset</button>
            </section>
            <div v-if="imageErrors.length" class="input-errors">
                <div v-for="error in imageErrors" :key="error" class="text-red-500 text-xs">{{ error }}</div>
            </div>
        </form>
    </Box>

    <Box class="mt-4">
        <template #header> Listing images </template>
        <div class="grid grid-cols-3 gap-4 mt-4">
            <div v-for="image in props.listing.images" :key="image.id" class="flex flex-col justify-between">
                <img :src="image.src" alt="image" class="w-full h-48 object-cover">
                <Link :href="route('realtor.listing.image.destroy', {listing: props.listing.id, image: image.id})"
                      method="delete"
                      class="btn-outline mt-2 text-xs"
                      as="button">
                    Delete
                </Link>
            </div>
        </div>
    </Box>
</template>

<script setup>
    import {Link} from "@inertiajs/inertia-vue3";
    import Box from "@/Components/UI/Box.vue";
    import {useForm} from "@inertiajs/inertia-vue3";
    import {computed} from "vue";
    import {Inertia} from "@inertiajs/inertia";
    import NProgress from "nprogress";

    Inertia.on('progress', (event) => {
        if(event.detail.progress.percentage) {
            NProgress.set((event.detail.progress.percentage / 100) * 0.9);
        }
    });

    const props = defineProps({
        listing: Object,
        image: Object,
    });

    const form = useForm({
        images: [],
    });

    const canUpload = computed(() => form.images.length > 0);

    const upload = () => {
        form.post(
            route('realtor.listing.image.store', {listing: props.listing.id}),
            {
                preserveScroll: true,
                onSuccess: () => {
                    form.reset('images')
                }
            }
        )
    };

    const addFiles = (event) => {
        for (const image of event.target.files) {
            form.images.push(image);
        }
    };

    const reset = () => {
        form.reset('images');
    };

    const imageErrors = computed(() => Object.values(form.errors));
</script>
