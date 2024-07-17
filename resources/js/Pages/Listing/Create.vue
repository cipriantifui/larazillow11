<template>
    <form @submit.prevent="create">
        <div>
            <div>
                <label for="beds">Beds</label>
                <input type="number" v-model.number="form.beds" id="beds" name="beds">
                <div v-if="form.errors.beds" class="form-error">
                    {{ form.errors.beds }}
                </div>
            </div>

            <div>
                <label for="baths">Baths</label>
                <input type="number" v-model.number="form.baths" id="baths" name="baths">
                <div v-if="form.errors.baths" class="form-error">
                    {{ form.errors.baths }}
                </div>
            </div>

            <div>
                <label for="area">Area</label>
                <input type="number" v-model.number="form.area" id="area" name="area">
                <div v-if="form.errors.area" class="form-error">
                    {{ form.errors.area }}
                </div>
            </div>

            <div>
                <label for="city">City</label>
                <input type="text" v-model.trim="form.city" id="city" name="city">
                <div v-if="form.errors.city" class="form-error">
                    {{ form.errors.city }}
                </div>
            </div>

            <div>
                <label for="postCode">Post Code</label>
                <input type="text" v-model.trim="form.code" id="postCode" name="postCode">
                <div v-if="form.errors.code" class="form-error">
                    {{ form.errors.code }}
                </div>
            </div>

            <div>
                <label for="street">Street</label>
                <input type="text" v-model.trim="form.street" id="street" name="street">
                <div v-if="form.errors.street" class="form-error">
                    {{ form.errors.street }}
                </div>
            </div>

            <div>
                <label for="street_nr">Street Number</label>
                <input type="text" v-model.trim="form.street_nr" id="street_nr" name="streetNr">
                <div v-if="form.errors.street_nr" class="form-error">
                    {{ form.errors.street_nr }}
                </div>
            </div>

            <div>
                <label for="price">Price</label>
                <input type="number" v-model.number="form.price" id="price" name="price">
                <div v-if="form.errors.price" class="form-error">
                    {{ form.errors.price }}
                </div>
            </div>

            <div>
                <button type="submit">Create Listing</button>
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

    const create = () => form.post("/listing");
</script>

<style scoped>
    label {
        margin-right: 2em;
    }

    div {
        padding: 2px;
    }

    .form-error {
        color: red;
    }
</style>
