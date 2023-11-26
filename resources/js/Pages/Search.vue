<template>
    <div class="bg-black">
    <HeaderComponent></HeaderComponent>
        <div class="container mx-auto px-4 max-w-lg min-h-screen">
            <h1 class="text-2xl font-bold mb-4 mt-4 text-white text-center">Meklēšana</h1>
            <form @submit.prevent="search" class="mb-8">
                <div class="relative flex">
                    <select v-model="form.category" :value="category"  required class="p-4 ps-10 text-sm text-gray-900 border border-gray-300 bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 rounded-l-lg dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" type="button">
                        <option value="">Izvēlēties kategoriju &nbsp&nbsp&nbsp</option>
                        <option value="companies">Uzņēmumi</option>
                        <option value="products">Pakalpojumi</option>
                    </select>
                    <input v-model="form.query" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Meklēt..." required>
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-green-800 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Meklēt</button>
                </div>
            </form>

            <div class="bg-gray-100 p-4 rounded-md">
                <h2 class="text-lg font-semibold mb-2">Rezultāti:</h2>
                <ul v-if="category === 'companies'">
                    <a v-for="result in results" :key="result" :href="'/companies/'+result.id"><li class="mb-2">{{ result.name }}</li></a>
                </ul>
                <ul v-else>
                    <a v-for="result in results" :key="result" :href="'/products/'+result.id"><li class="mb-2">{{ result.name }}</li></a>
                </ul>
            </div>
        </div>
        <FooterComponent></FooterComponent>
    </div>
</template>

<script setup>

import HeaderComponent from '/resources/js/Components/NavBar.vue';
import FooterComponent from '/resources/js/Components/Footer.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import {toRefs} from "vue";

const props = defineProps({
    results: String,
    category: String,
    query: String,
});

const { query } = toRefs(props);
const { results } = toRefs(props);
const { category } = toRefs(props);

const emit = defineEmits(['query', 'results', 'category'])

const form = useForm({
    query: query,
    category: category,
});


const search = () => {
    form.get(route('search'));
};
</script>

