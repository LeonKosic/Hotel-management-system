<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
  name: null,
  description: null,
  price: null,
})
</script>

<template>
  <form @submit.prevent="form.post('/rooms')">
    <div class="ml-[33%] mr-[33%] max-w items-center list-none list-inside self-center bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
      <div class="mb-6">
      <label for="name" class="block mb-2 text-sm font-medium text-white ">Naziv sobe:</label>
      <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  v-model="form.name">
    <div v-if="form.errors.email" class="block mb-2 text-sm font-medium text-white">{{ form.errors.email }}</div>
    </div>  
    <div class="mb-6">
    <label for="name" class="block mb-2 text-sm font-medium text-white ">Opis sobe:</label>       
    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  v-model="form.description">
    <div v-if="form.errors.description"  class="block mb-2 text-sm font-medium text-white">{{ form.errors.description }}</div>
    </div>  
    <div class="mb-6">
    <label for="price" class="block mb-2 text-sm font-medium text-white ">Cijena sobe:</label>       
    <input type="text"   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  v-model="form.price">
    <div v-if="form.errors.price"  class="block mb-2 text-sm font-medium text-white">{{ form.errors.price }}</div>
    </div>  
    <div class="mb-6">
    <button type="submit" class="text-white pl-[40%]" :disabled="form.processing">Kreiraj sobu</button>
    </div>  
    </div>
  </form>
</template>