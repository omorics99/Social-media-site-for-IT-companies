<script setup>
import { Head, Link } from '@inertiajs/vue3';


defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
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
