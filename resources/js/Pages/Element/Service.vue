<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm, Link } from '@inertiajs/inertia-vue3';
import { def } from '@vue/shared';

defineProps({
    service:Object,
});
const form = useForm({
  name: null,
  description: null,
  price: null,
})
</script>

<template>
    <Head title="Iznajmljivanje jedinica" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pregled usluge - {{ service.name }}</h2>
        </template>    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ service.description }}</p>
            <p class="font-semibold text-lg  text-green-600 dark:text-green-600">{{ service.price }}KM/DAN</p>
        </div> </div>   </div>

        
        <ul class="pl-[33%] w-[100%] items-center list-none list-inside self-center">
            <h1 class="mb-2 text-4xl font-bold tracking-tight text-black"> Sobe s dostupnim uslugama: </h1>
            <li v-for="room in service.rooms" class="py-4">
            <Link  method="get" :href='"/rooms/"+room.id' class="block w-[50%] p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{room.name }}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ room.description }}</p>
            <p class="font-semibold text-lg  text-green-600 dark:text-green-600">{{room.price }}KM/DAN</p>
           </Link>
         </li>
        </ul>
    </AuthenticatedLayout>
</template>
