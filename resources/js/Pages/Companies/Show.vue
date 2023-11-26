<template>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <HeaderComponent></HeaderComponent>
    <div class="min-h-screen">
        <div class="container mx-auto mt-8 flex">
            <div class="w-full p-4 bg-white mb-8 bg-gray-100">
                <!-- Business Logo, Name, Description, and Contact Information -->
                <div class="flex items-center space-x-4">
                    <!-- Business Logo (Replace 'logo.jpg' with the actual image file) -->
                    <img src="@/images/logo.png" alt="Business Logo" class="w-20 h-auto">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800">{{phpVariable.name}}</h1>
                        <p class="text-gray-600">{{phpVariable.description}}</p>
                        <p class="text-gray-600"><strong>E-pasts:</strong> {{phpVariable.email}}</p>
                        <p class="text-gray-600"><strong>Telefons:</strong> {{phpVariable.phone}}</p>
                        <strong>Mājaslapa: </strong><a :href="phpVariable.website_link" target="_blank">{{phpVariable.website_link}}</a>
                    </div>
                </div>
            </div>
            <!-- Right Sidebar with Events Section (Moved to the Right) -->
            <div class="hidden lg:block lg:w-1/4 p-4">
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Notikumi</h2>
                    <div class="text-gray-600">
                        <p class="mb-2">Notikums</p>
                        <p class="mb-2">Datums: 1. Janvāris, 2024</p>
                        <p class="mb-2">Laiks: 6:00 PM - 9:00 PM</p>
                        <p>Jelgava</p>
                        <button class="bg-green-700 text-white px-2 py-1 rounded mt-2">Sekot</button>
                        <button class="bg-green-700 text-white px-2 py-1 rounded mt-2 ml-2">Visi notikumi</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="container mx-auto mt-8 flex">

            <!-- Main Content Area -->
            <div class="flex-1 p-4 bg-white">
                <!-- Article Section -->
                <article class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Blogs</h2>
                    <!-- Post 1 -->
                    <div class="bg-gray-100 p-4 rounded-md mb-4">
                        <p class="text-gray-800">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet urna at sem bibendum facilisis.</p>
                        <div class="flex items-center space-x-4 mt-2">
                            <button class="text-green-700 hover:underline focus:outline-none">Like</button>
                            <button class="text-green-700 hover:underline focus:outline-none">Comment</button>
                            <button class="text-green-700 hover:underline focus:outline-none">Share</button>
                        </div>
                    </div>
                    <!-- Post 2 -->
                    <div class="bg-gray-100 p-4 rounded-md mb-4">
                        <p class="text-gray-800">Duis ut turpis vel neque cursus pellentesque eu id ligula. Vivamus accumsan ultricies justo, eget tincidunt nulla pharetra id.</p>
                        <div class="flex items-center space-x-4 mt-2">
                            <button class="text-green-700 hover:underline focus:outline-none">Like</button>
                            <button class="text-green-700 hover:underline focus:outline-none">Comment</button>
                            <button class="text-green-700 hover:underline focus:outline-none">Share</button>
                        </div>
                    </div>
                </article>
            </div>
            <div class="hidden lg:block lg:w-1/5 p-4">
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Produkti un pakalpojumi</h2>
                    <div v-for="item in subProducts" :key="item.id" class="flex">
                        <div class="mt-2 mb-2"><a :href="'/products/'+item.id" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-700">{{ item.name }}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <FooterComponent></FooterComponent>
</template>

<script>
import HeaderComponent from "@/Components/NavBar.vue";
import FooterComponent from "@/Components/Footer.vue";

export default {
    props: ['phpVariable', 'subProducts'],
    components: {
        HeaderComponent,
        FooterComponent,
    },
}
</script>
