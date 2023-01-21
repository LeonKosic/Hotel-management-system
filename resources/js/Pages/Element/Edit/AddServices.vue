<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm, Link, router } from '@inertiajs/inertia-vue3';
import { renderToNodeStream } from '@vue/server-renderer';

defineProps({
    room:Object,
    services:Array,
});
//const user = usePage().props.value.auth.user;
const form = useForm({
  name: null,
  description: null,
  price: 0,
})
</script>

<template>
    <Head title="Vezanje usluga" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl  text-gray-800 leading-tight">Stambena jedinica - {{room.name }}</h2>
        </template>   
        
        <ul v-if="services[0]" class="pl-[33%] w-[100%] items-center list-none list-inside self-center">
            <h1 class="mb-2 text-4xl font-bold tracking-tight text-black"> Sve usluge </h1>
            <li v-for="service in services" class="py-4">
            <Link  method="get" :href='"/services/"+service.id' class="block text-white w-[50%] p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">{{ service.name }}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ service.description }}</p>
            <p class="font-semibold text-lg  text-green-600 dark:text-green-600">{{service.price }} KM / DAN</p>
           </Link>
           <button class=" bg-white border text-white border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" @click="selectService(service.id)">{{data.services.includes(service.id)?"Soba posjeduje uslugu":"Soba ne posjeduje uslugu"}}</button>
         </li>
        </ul>
    
    <div class=" mx-[40%] items-center list-none list-inside self-center  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 ">
            <Link :href="'/rooms-services/'+room.id" class="text-white pl-[40%]" method="POST" as="button" :data="{data}">Sačuvaj</Link>
    </div>
    </AuthenticatedLayout>
  
</template>
<script>
export default{
    data(){  
        return{
            data:{
            services:[] 
            }
        }
    },
  
    methods: {
        selectService(id){
                let index = this.data.services.indexOf(id);
                if (index > -1) {
                    this.data.services.splice(index, 1);
                }else{
                   this.data.services.push(id);
                }
        },
      
    }
}
</script>