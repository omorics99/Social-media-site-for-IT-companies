<script setup>
  import { Head, Link } from '@inertiajs/vue3'
</script>
<template>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Include the Tailwind CSS stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-gray-900 p-4">
        <div class="container mx-auto">
            <a href="#" class="text-white text-xl font-bold">Zenvue</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-8 p-4 bg-white">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">About Us</h1>

        <div class="flex items-center space-x-4">
            <img src="https://th.bing.com/th/id/OIP.L-YH-bsVVmpHogOXnlr-CQHaHa?rs=1&pid=ImgDetMain" alt="Logo" class="w-32 h-32 rounded-full">
            <p class="text-gray-700">Zenvue is an amazing platform that empowers developers with innovative solutions.</p>
        </div>


        <div class="mt-8">
          <h2 class="text-xl font-bold mb-2 text-gray-800">Our Team</h2>

          <p class="text-gray-700">We have a dedicated team of professionals working towards...</p><br>

          <!-- Team Member Cards -->
          <div class="flex flex-wrap -mx-4">
              <!-- Team Member 1 -->
              <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-4">
                  <div class="bg-green-700 p-4 rounded-md">
                      <img src="https://webstockreview.net/images250_/human-clipart-old-boy-8.png" alt="Team Member 1" class="w-full h-auto object-cover mb-2 rounded-md">
                      <h3 class="text-lg text-white font-bold mb-2">Oskars</h3>
                      <p class="text-white">Position: Developer</p>
                      <!-- <p class="text-gray-700">Email: john@example.com</p> -->
                  </div>
              </div>

              <!-- Team Member 2 -->
              <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-4">
                  <div class="bg-green-700 p-4 rounded-md">
                      <img src="https://webstockreview.net/images250_/human-clipart-old-boy-8.png" alt="Team Member 2" class="w-full h-auto object-cover mb-2 rounded-md">
                      <h3 class="text-lg text-white font-bold mb-2">Arturs</h3>
                      <p class="text-white">Position: Developer</p>
                      <!-- <p class="text-gray-700">Email: jane@example.com</p> -->
                  </div>
              </div>

              <!-- Team Member 3 -->
              <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-4">
                  <div class="bg-green-700 p-4 rounded-md">
                      <img src="https://webstockreview.net/images250_/human-clipart-old-boy-8.png" alt="Team Member 3" class="w-full h-auto object-cover mb-2 rounded-md">
                      <h3 class="text-lg text-white font-bold mb-2">Rimants</h3>
                      <p class="text-white">Position: Developer</p>
                      <!-- <p class="text-gray-700">Email: mike@example.com</p> -->
                  </div>
              </div>

              <!-- Team Member 4 -->
              <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-4">
                  <div class="bg-green-700 p-4 rounded-md">
                      <img src="https://webstockreview.net/images250_/person-icon-png-15.png" alt="Team Member 4" class="w-full h-auto object-cover mb-2 rounded-md">
                      <h3 class="text-lg text-white font-bold mb-2">Sintija</h3>
                      <p class="text-white">Position: Designer</p>
                      <!-- <p class="text-gray-700">Email: emily@example.com</p> -->
                  </div>
              </div>
          </div>
          <!-- End of Team Member Cards -->
        </div>


        <div class="mt-8">
            <h2 class="text-xl font-bold mb-2 text-gray-800">Learn more about Zenvue and its features!</h2>
            <p class="text-gray-700">A dynamic web application aimed at promoting and fostering the growth of local IT solutions and products. 
              The goal of this challenge is to stimulate collaboration between local technology providers, entrepreneurs, 
              and consumers while driving economic growth and community development.</p>
        </div>

        <!-- Block with Bullet Points -->
        <div class="mt-8">
            <h2 class="text-xl font-bold mb-2 text-gray-800">We offer:</h2>
            <ul class="list-disc pl-4">
                <li class="text-darkgray-800">Product Showcase: Create a virtual marketplace where local IT businesses can showcase their innovative solutions, 
                  software applications, hardware products, and services.</li>
                <li class="text-darkgray-800">User Profiles: Enable users to create profiles with preferences and interests, 
                  allowing the app to recommend tailored local tech solutions and products.</li>
                <li class="text-darkgray-800">Business Networking: Develop a platform for local IT businesses to connect, 
                  collaborate, and potentially form partnerships to enhance their offerings.</li>
                <li class="text-darkgray-800">Community Reviews: Implement a review and rating system where users can provide 
                  feedback on their experiences with local tech products and services.</li>
                <li class="text-darkgray-800">Resource Hub: Include a section featuring resources, articles, 
                  and guides related to technology trends, entrepreneurship, and innovation.</li>
                <li class="text-darkgray-800">Event Listings: Display upcoming local tech-related events, workshops, 
                  and conferences to encourage knowledge sharing and networking.</li>
                <li class="text-darkgray-800">Localized Recommendations: Provide users with recommendations based on their location, 
                  ensuring they discover relevant local tech offerings.</li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            &copy; 2023 Zenvue. All rights reserved.
        </div>
    </footer>
  </body>
</template>