<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import GuestLayout from  '@/Layouts/GuestLayout.vue';
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        aaaaaa
        <Link :href ="route('login')"> Ulogujte se </Link>
        <Link :href ="route('register')"> Registrujte se </Link>
    </GuestLayout>
</template>
