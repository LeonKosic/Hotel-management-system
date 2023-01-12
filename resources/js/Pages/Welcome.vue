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
        <div class="xl"> 
            Samo odobreni, registrovani korisnici imaju pristup softveru za iznajmljivanje stambenih jedinica.
        </div>
        <div class = "pt-4 grid gap-3 content-center items-center " >
            <Link class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" :href ="route('login')"> Pristup softveru </Link>
            <Link class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" :href ="route('register')"> Zahtjev za registraciju </Link>
        </div>
    </GuestLayout>
</template>
