
<template>
<<<<<<< Updated upstream
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Tailwind CSS Home Page</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="font-sans bg-gray-100">

    <header class="bg-gray-200 p-4 text-center">
        <h1 class="text-2xl font-bold">Welcome to My Tailwind CSS Website</h1>
    </header>

    <nav class="bg-gray-800 text-white p-4">
        <a href="#" class="hover:underline">Home</a>
        <a href="#" class="hover:underline">About</a>
        <a href="#" class="hover:underline">Contact</a>
    </nav>

    <section class="p-8">
        <h2 class="text-2xl font-bold">Latest News</h2>
        <p class="mt-4">News 1: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p class="mt-4">News 2: Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p class="mt-4">News 3: Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
    </section>

    <footer class="bg-gray-200 p-4 text-center">
        <p>&copy; 2023 My Tailwind CSS Website. All rights reserved.</p>
    </footer>

    </body>
    </html>

</template>
=======
    <div class="bg-black">
        <HeaderComponent></HeaderComponent>
        <div class="relative">
            <img src="@/images/home.jpg"/>
            <div class="container mx-auto p-4 w-1/2 absolute bottom-10 right-10">
                <div class="p-6 rounded-lg bg-black text-white">
                    <h1 class="text-2xl rounded-lg font-bold mb-4">ZenVue</h1>
                    <p class="text-white-700">LocalTech Connect: vietējo inovāciju veicināšana</p>
                    <button class="bg-green-800 text-white px-4 py-2 mt-4 rounded-md hover:bg-green-600">Par mums</button>
                </div>
            </div>
        </div>
        <div class="font-bold text-white text-center p-10">
            <h2 class="text-2xl m-4">Mūsu sadarbības partneri</h2>
            <div class="bg-black flex items-center justify-center">
                <div class="bg-green-800 p-8 rounded-md text-center hover:bg-green-600">
                    <img src="https://ces.lv/wp-content/uploads/2022/11/ces_logo.png" alt="Company Logo" class="mb-4">
                    <h1 class="text-2xl font-bold">Company Name 1</h1>
                </div>

                <div class="bg-green-800 p-8 rounded-md text-center ml-4 hover:bg-green-600">
                    <img src="https://ces.lv/wp-content/uploads/2022/11/ces_logo.png" alt="Company Logo" class="mb-4">
                    <h1 class="text-2xl font-bold">Company Name 2</h1>
                </div>

                <div class="bg-green-800 p-8 rounded-md text-center ml-4 hover:bg-green-600">
                    <img src="https://ces.lv/wp-content/uploads/2022/11/ces_logo.png" alt="Company Logo" class="mb-4">
                    <h1 class="text-2xl font-bold">Company Name 3</h1>
                </div>
            </div>
            <div class="flex mt-4">
                <button class="bg-green-800 text-white px-4 py-2 rounded-md hover:bg-green-600 ml-auto">Apskatīt visus</button>
            </div>
        </div>
        <div class="font-bold text-white text-center p-10">
            <h2 class="text-2xl m-4">Pakalpojumi un produkti</h2>
            <div class="bg-black flex items-center justify-center">
                <div class="bg-green-800 text-white p-8 rounded-lg hover:bg-green-600 w-1/2">
                    <h2 class="text-xl font-bold mb-2">Product 1 Name</h2>
                    <p class="text-gray-100 mb-4">Description of Product 1 goes here.</p>
                    <button class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-700">View Details</button>
                </div>

                <div class="bg-green-800 text-white p-8 rounded-lg hover:bg-green-600 ml-6 w-1/2">
                    <h2 class="text-xl font-bold mb-2">Product 2 Name</h2>
                    <p class="text-gray-100 mb-4">Description of Product 2 goes here.</p>
                    <button class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-700">View Details</button>
                </div>
            </div>
            <div class="flex mt-4">
                <button class="bg-green-800 text-white px-4 py-2 rounded-md hover:bg-green-600 ml-auto">Apskatīt visus</button>
            </div>
        </div>
        <h1 class="text-white text-center text-2xl">Powered by</h1>
        <div class="container mx-auto p-8 flex justify-around w-1/2">
            <div class="p-6 w-1/4 flex items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/2367px-Vue.js_Logo_2.svg.png" alt="Vue 3 Logo" class="mx-auto mb-4">
            </div>

            <div class="p-6 w-1/4 flex items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="Laravel Logo" class="mx-auto mb-4">
            </div>

            <div class="p-6 w-1/4 flex items-center">
                <img src="https://chatgptaihub.com/wp-content/uploads/2023/06/ChatGPT-logo-with-color-Background.png" alt="OpenAI Logo" class="mx-auto mb-4">
            </div>

            <div class="p-6 w-1/4 flex items-center">
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
    components: {
        HeaderComponent,
        FooterComponent,
    },
}
</script>
<style>
</style>
>>>>>>> Stashed changes
