<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head ,useForm,Link} from '@inertiajs/inertia-vue3'

defineProps({
    admin:Object,
    room :Object,
})


</script>

<template>
    <Head title="Izmjena sobe" />
    <AuthenticatedLayout >
        <div class="ml-[33%] mr-[33%] max-w items-center list-none list-inside self-center bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-white ">Naziv sobe:</label>
                <input id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="room.name" />
            </div>
            <div class="mb-6">
                <label for="price"  class="block mb-2 text-sm font-medium  text-white ">Cijena sobe:</label>
                <input id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="room.price" />
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium  text-white ">Opis sobe:</label>
                <input id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="room.description" />
            </div>
            <div class="mb-6">
                <Link :href="'/rooms/'+room.id" class="text-white pl-[40%]" method="POST" as="button" :data="{room}">Sačuvaj</Link>
            </div>
        </div>
    </AuthenticatedLayout>


</template>

