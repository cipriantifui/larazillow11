<template>
    <form @submit.prevent="update">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label for="beds" class="label">Beds</label>
                <input type="number" v-model.number="form.beds" id="beds" name="beds" class="input">
                <div v-if="form.errors.beds" class="form-error">
                    {{ form.errors.beds }}
                </div>
            </div>
            <div class="col-span-2">
                <label for="baths" class="label">Baths</label>
                <input type="number" v-model.number="form.baths" id="baths" name="baths" class="input">
                <div v-if="form.errors.baths" class="form-error">
                    {{ form.errors.baths }}
                </div>
            </div>
            <div class="col-span-2">
                <label for="area" class="label">Area</label>
                <input type="number" v-model.number="form.area" id="area" name="area" class="input">
                <div v-if="form.errors.area" class="form-error">
                    {{ form.errors.area }}
                </div>
            </div>

            <div class="col-span-4">
                <label for="city" class="label">City</label>
                <input type="text" v-model.trim="form.city" id="city" name="city" class="input">
                <div v-if="form.errors.city" class="form-error">
                    {{ form.errors.city }}
                </div>
            </div>

            <div class="col-span-2">
                <label for="postCode" class="label">Post Code</label>
                <input type="text" v-model.trim="form.code" id="postCode" name="postCode" class="input">
                <div v-if="form.errors.code" class="form-error">
                    {{ form.errors.code }}
                </div>
            </div>

            <div class="col-span-4">
                <label for="street" class="label">Street</label>
                <input type="text" v-model.trim="form.street" id="street" name="street" class="input">
                <div v-if="form.errors.street" class="form-error">
                    {{ form.errors.street }}
                </div>
            </div>

            <div class="col-span-2">
                <label for="street_nr" class="label">Street Number</label>
                <input type="text" v-model.trim="form.street_nr" id="street_nr" name="streetNr" class="input">
                <div v-if="form.errors.street_nr" class="form-error">
                    {{ form.errors.street_nr }}
                </div>
            </div>

            <div class="col-span-6">
                <label for="price" class="label">Price</label>
                <input type="number" v-model.number="form.price" id="price" name="price" class="input">
                <div v-if="form.errors.price" class="form-error">
                    {{ form.errors.price }}
                </div>
            </div>

            <div class="col-span-6">
                <button type="submit" class="btn-primary">Edit</button>
            </div>
        </div>
    </form>
</template>

<script setup>
    import {useForm} from "@inertiajs/inertia-vue3";
    const props = defineProps({
        listing: Object,
    });
    const form = useForm({
        beds: props.listing.beds,
        baths: props.listing.baths,
        area: props.listing.area,
        city: props.listing.city,
        code: props.listing.code,
        street: props.listing.street,
        street_nr: props.listing.street_nr,
        price: props.listing.price,
    });

    const update = () => form.put(route('listing.update', {listing: props.listing.id}));
</script>

<style scoped>
</style>
