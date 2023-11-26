<template>
    <div class="bg-black">
        <HeaderComponent></HeaderComponent>
        <div class="min-h-screen">
            <h1 class="font-bold text-white text-center text-lg mt-4">Produkta ievades forma</h1>

            <form @submit.prevent="submitForm" class="max-w-lg mx-auto">
                <div class="bg-black container mx-auto">
                    <div class="w-full">
                        <label for="name" class="block mb-2 font-medium font-bold text-white">Nosaukums</label>
                        <input v-model="form.name" type="text" id="name" class="w-full px-4 py-2 mb-4 border rounded-md" placeholder="Produkts">
                    </div>
                    <div class="w-full">
                        <label for="description" class="block mb-2 font-medium font-bold text-white">Produkta apraksts</label>
                        <textarea v-model="form.description" type="text" id="description" class="w-full px-4 py-2 mb-4 border rounded-md" rows="4" placeholder="Apraksts"></textarea>
                    </div>
                    <input v-model="form.company_id" hidden id="company_id">
                    <input v-model="form.user_id" hidden id="user_id">
                    <div class=" text-end">
                        <button class="bg-green-800 text-white px-4 py-2 rounded-md hover:bg-green-600 ml-auto">Iesniegt</button>
                    </div>
                </div>
            </form>
        </div>
        <FooterComponent></FooterComponent>
    </div>
</template>

<script setup>
import HeaderComponent from '/resources/js/Components/NavBar.vue';
import FooterComponent from '/resources/js/Components/Footer.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    description: '',
    company_id: 1,
    user_id: 1,
});

const submitForm = () => {
    form.post(route('products.store'));
};
</script>
