<template>
    <form>
        <div class="my-4 flex flex-wrap gap-4">
            <div class="flex flex-nowrap items-center gap-2">
                <input v-model="filterForm.deleted" id="deleted" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="deleted">Deleted</label>
            </div>
        </div>
    </form>
</template>

<script setup>
    import {reactive, watch} from "vue";
    import {Inertia} from "@inertiajs/inertia";
    import {debounce} from "lodash";

    const filterForm = reactive({
        deleted: false
    });

    watch(filterForm, debounce((newVal) =>
        Inertia.get(route('realtor.listing.index'), newVal, {preserveState: true, deep: true})
    ,500));
</script>
