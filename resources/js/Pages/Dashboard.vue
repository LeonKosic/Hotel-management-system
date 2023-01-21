<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    rooms:Array,
});
</script>


<template>

    <Head title="Iznajmljivanje jedinica" />


    


    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{rooms.length()?"Prikaz stambenih jedinica":"Slobodne stambene jedinice u datom periodu" }}</h2>
        </template>

        <div class="grid md:grid-cols-2 md:gap-6 pl-[40%] w-[60%]">
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="before" id="before" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="before" required />
        <label for="before" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Datum početka rezervacije</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="after" id="after" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model='after' required />
        <label for="before" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Datum kraja rezervacije</label>
    </div>
    <div class="p-4 mb-4 text-m text-white bg-blue-100 rounded-lg dark:bg-gray-800" >
        <Link :href="'/dashboard/'" class="text-white pl-[40%]" method="POST" as="button" :data="{before,after}">Pretraži</Link>
    </div>
</div>
        <ul class="pl-[33%] w-[100%] items-center list-none list-inside self-center">
            <li v-for="room in rooms" class="py-4">
            <Link  method="get" :href='"/rooms/"+room.id' class="block w-[50%] p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ room.name }}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ room.description }}</p>
            <p class="font-semibold text-lg  text-green-600 dark:text-green-600">{{ room.price }}KM/DAN</p>
           </Link>
         </li>
        </ul>
        
                
           
    </AuthenticatedLayout>
</template>
<script>
export default{
    data(){  
        return{
           
            before:new Date().toISOString().split('T')[0],
            after:new Date().toISOString().split('T')[0], 
            
        }
    },
}
</script>