<template>
    <form @submit.prevent="login">
        <div class="w-1/2 mx-auto">
            <div>
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
                <button class="btn-primary w-full" type="submit">Login</button>
            </div>
        </div>
    </form>
</template>

<script setup>
    import {useForm} from "@inertiajs/inertia-vue3";

    const form = useForm({
        email: null,
        password: null
    });
    const login = () => {
        form.post(route('login.store'));
    }
</script>
