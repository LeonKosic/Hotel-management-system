<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    reservations:Array,
    user:Object,
});
</script>

<template>
    <Head title="Rezervacije" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Rezervacije</h2>
        </template>
        <h1 class="mx-[30%] block w-[50%] p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-2 text-2xl font-bold tracking-tight  dark:text-white">
         {{ reservations.length?(user.type==1?"Aktivne rezervacije":"Vaše rezervacije"):"Nema aktivnih rezervacije" }}
        </h1>
        
        <ul class="pl-[33%] w-[100%] items-center list-none list-inside self-center">
            <li v-for="res in reservations" class="py-4">
            <Link  method="get" :href='"/rooms/"+res.room.id' class="block w-[50%] p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ res.user.name }}</h5>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ res.room.name }}</h5>
            <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ res.reservation_start.split(' ')[0] }} - {{ res.reservation_end.split(' ')[0] }}</h6>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ res.room.description }}</p>
            <p class="font-semibold text-lg  text-green-600 dark:text-green-600">{{ res.price }}KM/DAN</p>
           </Link>
           <Link method="post" v-if="user.type!=1" class="block bg-red-700 text-white shadow-md p-2 w-30" :href='"/reservation/"+res.id' as="button">{{res.active?"Zahtjev otkazivanja":"Povucite zahtjev"}}</Link>
           <Link method="delete" v-else class="block bg-red-700 text-white shadow-md p-2 w-30" :href='"/reservation/"+res.id' as="button">{{!res.active?"Odobrite zahtjev za otkazivanje":"Otkažite rezervaciju" }}</Link>
        </li>
        </ul>
        
                
           
    </AuthenticatedLayout>
</template>
