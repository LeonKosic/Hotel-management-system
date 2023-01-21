<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    services:Array,
    admin:Object,
});
</script>

<template>
    <Head title="Sobe" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Lista servisa</h2>
        </template>
       
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <Link :href="'/services/create'" method="get" as="button">
                    <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Dodaj uslugu
                    </button>
        </Link>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Naziv
                </th>
                <th scope="col" class="px-6 py-3">
                    Cijena
                </th>
                <th scope="col" class="px-6 py-3">
                    Aktivno
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Opcije</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="service in services" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{service.id}}
                    </th>
                    <td class="px-6 py-4">
                        {{service.name}}
                    </td>
                    <td class="px-6 py-4">
                        {{service.price}} 
                    </td>
                    <td class="px-6 py-4">
                        {{service.active?"Aktivan":"Neaktivan"}} 
                    </td>
               
                <td >
                    <div class="inline-flex rounded-md shadow-sm" role="gsaroup">
                        <Link :href="'/services/'+service.id+'/edit'" method="get">
                    <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2 fill-current" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>                  Izmjena
                    </button>
                    </Link>
                    <Link :href="'/services/'+service.id" method="delete" as="button">
                    <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                       {{ service.active?"Deaktiviraj":"Aktiviraj" }}
                    </button>
                 </Link>
                 <Link :href="'/services/'+service.id" method="get" as="button">
                    <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Pregled
                    </button>
                 </Link>
                    
                    </div>
                    
                
                    
                </td>
            </tr>
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
