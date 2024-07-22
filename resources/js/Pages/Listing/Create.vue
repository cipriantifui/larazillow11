<template>
    <form @submit.prevent="create">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label for="beds" class="label">Beds</label>
                <input type="number" v-model.number="form.beds"
                       id="beds" name="beds"
                       class="block w-full p-2 rounded-md shadow-sm border-gray-300 dark:border-gray-600 text-gray-500">
                <div v-if="form.errors.beds" class="form-error">
                    {{ form.errors.beds }}
                </div>
            </div>

            <div class="col-span-2">
                <label for="baths" class="label">Baths</label>
                <input type="number" v-model.number="form.baths"
                       id="baths"
                       name="baths"
                       class="block w-full p-2 rounded-md shadow-sm border-gray-300 dark:border-gray-600 text-gray-500">
                <div v-if="form.errors.baths" class="form-error">
                    {{ form.errors.baths }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label" for="area">Area</label>
                <input type="number" v-model.number="form.area" id="area" name="area" class="input">
                <div v-if="form.errors.area" class="form-error">
                    {{ form.errors.area }}
                </div>
            </div>

            <div class="col-span-4">
                <label class="label" for="city">City</label>
                <input type="text" v-model.trim="form.city"
                       id="city" name="city" class="input">
                <div v-if="form.errors.city" class="form-error">
                    {{ form.errors.city }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label" for="postCode">Post Code</label>
                <input type="text" v-model.trim="form.code"
                       id="postCode" name="postCode" class="input">
                <div v-if="form.errors.code" class="form-error">
                    {{ form.errors.code }}
                </div>
            </div>

            <div class="col-span-4">
                <label class="label" for="street">Street</label>
                <input type="text" v-model.trim="form.street"
                       id="street" name="street" class="input">
                <div v-if="form.errors.street" class="form-error">
                    {{ form.errors.street }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label" for="street_nr">Street Number</label>
                <input type="text" v-model.trim="form.street_nr"
                       id="street_nr" name="streetNr" class="input">
                <div v-if="form.errors.street_nr" class="form-error">
                    {{ form.errors.street_nr }}
                </div>
            </div>

            <div class="col-span-6">
                <label class="label" for="price">Price</label>
                <input type="number" v-model.number="form.price"
                       id="price" name="price" class="input">
                <div v-if="form.errors.price" class="form-error">
                    {{ form.errors.price }}
                </div>
            </div>

            <div class="col-span-6">
                <button type="submit" class="btn-primary">Create</button>
            </div>
        </div>
    </form>
</template>

<script setup>
    import {useForm} from "@inertiajs/inertia-vue3";

    const form = useForm({
        beds: 0,
        baths: 0,
        area: 0,
        city: null,
        code: null,
        street: null,
        street_nr: null,
        price: 0,
    });

    const create = () => form.post(route('listing.store'));
</script>

<style scoped>
</style>
