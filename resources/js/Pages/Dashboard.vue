<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
const rooms= [
        {name:"test123"},
        {name:"test122"},
    ]
defineProps({
    
});
</script>

<template>
    <Head title="Sobe" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pregled soba</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div v-for="room in rooms" :key="room.name">
                        {{ room.name }}
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
