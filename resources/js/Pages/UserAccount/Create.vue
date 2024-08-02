<template>
    <form @submit.prevent="register">
        <div class="w-1/2 mx-auto">
            <div>
                <label class="label" for="name">Your Name</label>
                <input class="input" v-model="form.name" type="text" name="name" id="name"/>
                <div class="form-error" v-if="form.errors.name">{{form.errors.name}}</div>
            </div>
            <div class="mt-4">
                <label class="label" for="email">E-mail (username)</label>
                <input class="input" v-model="form.email" type="text" name="email" id="email"/>
                <div class="form-error" v-if="form.errors.email">{{form.errors.email}}</div>
            </div>
            <div class="mt-4">
                <label class="label" for="password">Password</label>
                <input class="input" v-model="form.password" type="password" name="password" id="password"/>
                <div class="form-error" v-if="form.errors.password">{{ form.errors.password }}</div>
            </div>
            <div class="mt-4">
                <label class="label" for="password_confirmation">Confirm Password</label>
                <input class="input" v-model="form.password_confirmation" type="password" name="password_confirmation" id="password_confirmation"/>
                <div class="form-error" v-if="form.errors.password_confirmation">{{ form.errors.password_confirmation }}</div>
            </div>
            <div class="mt-4">
                <button class="btn-primary w-full" type="submit">Create Account</button>

                <div class="mt-2 text-center">
                    <Link :href="route('login')" class="text-sm text-gray-500">
                        Already have an account? Login
                    </Link>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import {Link, useForm} from "@inertiajs/inertia-vue3";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});
const register = () => {
    form.post(route('user-account.store'));
}
</script>
