<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm, Link, router } from '@inertiajs/inertia-vue3';
import { renderToNodeStream } from '@vue/server-renderer';

defineProps({
    room:Object,
    user:Object,
    inputDate:Boolean,
});
//const user = usePage().props.value.auth.user;
const form = useForm({
  name: null,
  description: null,
  price: 0,
})
</script>

<template>
    <Head title="Iznajmljivanje jedinica" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl  text-gray-800 leading-tight">Iznajmljivanje stambene jedinice - {{room.name }}</h2>
        </template>   
         <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 block  bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" >
              
        <p class="font-normal text-gray-700 dark:text-gray-400">{{ room.description }}</p>
        <p class="font-semibold text-lg  text-green-600 dark:text-green-600">{{ room.price }} KM/DAN</p>
                </div> </div>   

        
        <ul v-if="room.services[0]" class="pl-[33%] w-[100%] items-center list-none list-inside self-center">
            <h1 class="mb-2 text-4xl font-bold tracking-tight text-black"> Dostupne usluge </h1>
            <li v-for="service in room.services" class="py-4">
            <Link  method="get" :href='"/services/"+service.id' class="block text-white w-[50%] p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">{{ service.name }}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ service.description }}</p>
            <p class="font-semibold text-lg  text-green-600 dark:text-green-600">{{service.price }} KM / DAN</p>
           </Link>
           <button class=" bg-white border text-white border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" @click="selectService(service.id,service.price)">{{data.services.includes(service.id)?"Ukloni uslugu":"Dodaj uslugu"}}</button>
         </li>
        </ul>

        <div class="grid md:grid-cols-2 md:gap-6 pl-[40%] w-[60%]">
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="reservation_start" id="reservation_start" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="data.dateStart" required />
        <label for="reservation_start" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Datum početka rezervacije</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="reservation_end" id="reservation_end" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model='data.dateEnd' required />
        <label for="reservation_end" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Datum kraja rezervacije</label>
    </div>
    <div v-if="!inputDate" class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-gray-800 dark:text-blue-400" role="alert">
    <span class="font-medium">Greška </span> Datum nije dostupan ili je unesen pogrešan datum
    </div>
  </div>
    <div class=" mx-[40%] items-center list-none list-inside self-center  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 ">
            <div class=" text-green-400 " v-if="data.price>0">{{ data.price }} KM/DAN</div>

            <Link :href="'/reservations/'" class="text-white pl-[40%]" method="POST" as="button" :data="{data}">Rezerviši</Link>
    </div>
    </AuthenticatedLayout>
  
</template>
<script>
export default{
    data(){  
        return{
            data:{
            user_id:null,
            room_id:null,
            services:[] ,
            dateStart:new Date().toISOString().split('T')[0],
            dateEnd:new Date().toISOString().split('T')[0], 
            price:0,
            }
        }
    },
    mounted() {
        this.data.user_id=this.user.id;
        this.data.room_id=this.room.id;
        this.data.price=this.room.price;
    },
    methods: {
        selectService(id,price){
                if(this.data.price==0)this.data.price+=this.room.price;
                let index = this.data.services.indexOf(id);
                if (index > -1) {
                    this.data.services.splice(index, 1);
                    this.data.price-=price;
                }else{
                   this.data.services.push(id);
                   this.data.price+=price;
                }
        },
      
    }
}
</script>