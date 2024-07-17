<template>
    <Link href="/">Main Page  </Link>
    <Link href="/hello">Show Page  </Link>

    <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
    </div>

    <slot />
</template>

<script setup>
import {computed} from "vue";
import {Link, usePage} from '@inertiajs/inertia-vue3'
// page props are available in the setup function

const page = usePage();
const flashSuccess = computed(() => page.props.value.flash.success);

</script>

<style scoped>
    .success {
        background-color: #d1e7dd;
        border-color: #badbcc;
        color: #0f5132;
        margin-bottom: 1rem;
        padding: .75rem 1.25rem;
        border: 1px solid transparent;
        border-radius: .25rem;
    }
</style>
