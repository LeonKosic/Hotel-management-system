<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    user:Object,
    service:Object,
});
</script>

<template>
    <Head title="Iznajmljivanje jedinica" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Iznajmljivanje stambenih jedinica</h2>
        </template>
        <ul class="pl-[33%] w-[100%] items-center list-none list-inside self-center">
            <li v-for="service in services" class="py-4">
            <Link  method="get" :href='"/services/"+service.id' class="block w-[50%] p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ service.name }}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ service.description }}</p>
            <p class="font-semibold text-lg  text-green-600 dark:text-green-600">{{ service.price }}KM</p>
           </Link>
         </li>
        </ul>
        
                
           
    </AuthenticatedLayout>
</template>
