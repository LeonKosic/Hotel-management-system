<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
const rooms= [
        {id:1,name:"test123", price:1233, description : "123123"},
        {id:2,name:"test122", price:1233, description : "123123"}
    ]
defineProps({
    
});
</script>

<template>
    <Head title="Iznajmljivanje jedinica" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Iznamljivanje stambenih jedinica</h2>
        </template>
        <ul class="pl-[40%] text-gray-500  items-center list-none list-inside self-center">
            <li v-for="room in rooms" class="py-4">
            <Link  method="get" :href='"/rooms/"+room.id' class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ room.name }}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ room.description }}</p>
            <p class="font-normal text-green-600 dark:text-gray-400">{{ room.price }}KM</p>
           </Link>
         </li>
        </ul>
        
                
           
    </AuthenticatedLayout>
</template>
