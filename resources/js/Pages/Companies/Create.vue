<template>
    <div class="bg-black">
        <HeaderComponent></HeaderComponent>
        <div class="min-h-screen">
            <h1 class="font-bold text-white text-center text-lg mt-4">Uzņēmuma ievades forma</h1>

            <form @submit.prevent="submitForm" class="max-w-lg mx-auto">
                <div class="bg-black container mx-auto">
                    <div class="w-full">
                        <label for="name" class="block mb-2 font-medium font-bold text-white">Nosaukums</label>
                        <input v-model="form.name" type="text" id="name" class="w-full px-4 py-2 mb-4 border rounded-md" placeholder="Uzņēmums">
                    </div>
                    <div class="w-full">
                        <label for="description" class="block mb-2 font-medium font-bold text-white">Uzņemuma apraksts</label>
                        <textarea v-model="form.description" type="text" id="description" class="w-full px-4 py-2 mb-4 border rounded-md" rows="4" placeholder="Apraksts"></textarea>
                    </div>
                    <div class="w-full">
                        <label for="email" class="block mb-2 font-medium font-bold text-white">E-pasts</label>
                        <input v-model="form.email" type="email" id="email" class="w-full px-4 py-2 mb-4 border rounded-md" placeholder="test@gmail.com">
                    </div>
                    <div class="w-full">
                        <label for="adress" class="block mb-2 font-medium font-bold text-white">Adrese</label>
                        <input v-model="form.adress" type="text" id="adress" class="w-full px-4 py-2 mb-4 border rounded-md" placeholder="123 Kandavas iela, Rīga">
                    </div>
                    <div class="w-full">
                        <label for="gallery" class="block mb-2 font-medium font-bold text-white">Attēls</label>
                        <input accept="image/*" @change="handleImageChange" type="file" id="gallery" class="w-full px-4 py-2 mb-4 border rounded-md border-0">
                    </div>
                    <div class="w-full">
                        <label for="phone" class="block mb-2 font-medium font-bold text-white">Telefona numurs</label>
                        <input v-model="form.phone" type="tel" id="phone" class="w-full px-4 py-2 mb-4 border rounded-md" placeholder="20000000">
                    </div>
                    <div class="w-full">
                        <label for="website_link" class="block mb-2 font-medium font-bold text-white">Mājaslapa</label>
                        <input v-model="form.website_link" type="text" id="website_link" class="w-full px-4 py-2 mb-4 border rounded-md" placeholder="www.kompanija.lv">
                    </div>
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
    image: null,
    email: null,
    adress: null,
    website_link: null,
    phone: null,
});

const submitForm = () => {
    form.post(route('companies.store'));
};
</script>
