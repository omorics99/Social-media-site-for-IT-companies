
<template>
    <div class="bg-black">
        <HeaderComponent></HeaderComponent>
            <img src="@/images/home.jpg" class="h-1/3"/>
            <div class="relative container">
                <div class="container mx-auto p-4 w-1/3 absolute bottom-10 right-0">
                    <div class="p-6 pb-8 rounded-lg bg-black text-white">
                        <h1 class="text-2xl rounded-lg font-bold mb-4">ZenVue</h1>
                        <p class="text-white-700 mb-4">LocalTech Connect: vietējo inovāciju veicināšana</p>
                        <a :href="'/about'" class="bg-green-800 text-white px-4 py-2 mt-4rounded-md hover:bg-green-600">Par mums</a>
                    </div>
                </div>
            </div>
            <div class="font-bold text-white text-center p-10 container mx-auto">
                <h2 class="text-2xl m-4">Mūsu sadarbības partneri</h2>
                <div class="bg-black flex flex-wrap items-center justify-center">
                    <div v-for="item in companies.slice(0, 4)" :key="item.id" class="p-2 w-1/4">
                        <div class="bg-green-800 p-4 rounded-md text-center hover:bg-green-600 justify-center">
                            <img src="@/images/logo.png" alt="Company Logo" class="mb-4 mx-auto">
                            <h1 class="text-2xl font-bold mb-2">{{ item.name }}</h1>
                            <a :href="'/companies/'+item.id" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-700">Uzzināt vairāk</a>
                        </div>
                    </div>
                </div>
                <div class="flex mt-4 p-2">
                    <a :href="'/companies'" class="bg-green-800 text-white px-4 py-2 rounded-md hover:bg-green-600 ml-auto">Apskatīt visus</a>
                </div>
            </div>

            <div class="font-bold text-white text-center p-10 container mx-auto">
                <h2 class="text-2xl m-4">Pakalpojumi un produkti</h2>
                <div class="bg-black flex flex-wrap items-center justify-center">
                    <div v-for="item in products.slice(0, 4)" :key="item.id" class="p-2 w-1/2">
                        <div class="bg-green-800 p-4 rounded-md text-center hover:bg-green-600 justify-center">
                            <h2 class="text-2xl font-bold mb-2">{{ item.name }}</h2>
                            <p class="text-gray-100 mb-4">
                                {{ item.description.length >= 150 ? item.description.substring(0,150) + ".." : item.description }}
                            </p>
                            <a :href="'/products/'+item.id" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-700">Uzzināt vairāk</a>
                        </div>
                    </div>
                </div>
                <div class="flex mt-4 p-2">
                    <a :href="'/products'" class="bg-green-800 text-white px-4 py-2 rounded-md hover:bg-green-600 ml-auto">Apskatīt visus</a>
                </div>
            </div>
            <h1 class="text-white text-center text-2xl">Powered by</h1>
            <div class="container mx-auto p-8 flex justify-around w-1/3">
                <div class="p-6 w-1/3 flex items-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/2367px-Vue.js_Logo_2.svg.png" alt="Vue 3 Logo" class="mx-auto mb-4">
                </div>

                <div class="p-6 w-1/3 flex items-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="Laravel Logo" class="mx-auto mb-4">
                </div>

                <div class="p-6 w-1/3 flex items-center">
                    <img src="https://static-00.iconduck.com/assets.00/tailwind-css-icon-2048x1229-u8dzt4uh.png" alt="TailWind Logo" class="mx-auto mb-4">
                </div>
            </div>
        <FooterComponent></FooterComponent>
    </div>

</template>
<script>
import { Head, Link } from '@inertiajs/vue3';
import HeaderComponent from '/resources/js/Components/NavBar.vue';
import FooterComponent from '/resources/js/Components/Footer.vue';
export default {
    props: ['products', 'companies'],
    components: {
        HeaderComponent,
        FooterComponent,
    },
}
</script>
<style>
</style>
