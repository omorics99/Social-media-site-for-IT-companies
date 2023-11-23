<script setup>
  import { Head, Link } from '@inertiajs/vue3'
</script>
<template>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-green-700 p-4">
      <div class="container mx-auto flex items-center justify-between">
          <a href="#" class="text-white text-2xl font-bold">Social Media Name</a>
          <div class="flex items-center space-x-4">
              <a href="#" class="text-white hover:text-gray-300 transition duration-300">Home</a>
              <a href="#" class="text-white hover:text-gray-300 transition duration-300">Profile</a>
              <a href="#" class="text-white hover:text-gray-300 transition duration-300">Settings</a>
          </div>
      </div>
  </nav>

  <!-- Main Content -->
  <div class="container mx-auto mt-8 flex">
      <!-- Business Section -->
      <div class="w-full p-4 bg-white mb-8">
          <!-- Business Logo, Name, Description, and Contact Information -->
          <div class="flex items-center space-x-4">
              <!-- Business Logo (Replace 'logo.jpg' with the actual image file) -->
              <img src="https://th.bing.com/th/id/OIP.L-YH-bsVVmpHogOXnlr-CQHaHa?rs=1&pid=ImgDetMain" alt="Business Logo" class="w-20 h-auto rounded-full">

              <!-- Business Information -->
              <div>
                  <h1 class="text-2xl font-semibold text-gray-800">Your Business Name</h1>
                  <p class="text-gray-600">Description about your business goes here. It can be a brief overview of your products or services.</p>
                  <p class="text-gray-600">Email: example@example.com</p>
                  <p class="text-gray-600">Phone: (123) 456-7890</p>
              </div>
          </div>
      </div>
      <!-- Right Sidebar with Events Section (Moved to the Right) -->
      <div class="hidden lg:block lg:w-1/4 p-4">
        <!-- Events Section -->
        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Events</h2>
            <div class="text-gray-600">
                <p class="mb-2">Upcoming Event: Event Name</p>
                <p class="mb-2">Date: January 1, 2024</p>
                <p class="mb-2">Time: 6:00 PM - 9:00 PM</p>
                <p>Venue: Event Venue, City</p>
                <!-- Interested Button -->
                <button class="bg-green-700 text-white px-2 py-1 rounded mt-2">Interested</button>
            </div>
        </div>
      </div>
      
    </div>
    <div class="container mx-auto mt-8 flex">
      <!-- Left Sidebar with Followers Section -->
      <div class="hidden lg:block w-1/6 p-4 bg-white border-r">
          <!-- Followers Section with Avatar Images -->
          <div class="mb-8">
              <h2 class="text-lg font-semibold text-gray-800 mb-2">Followers</h2>
              <h6 class="italic text-gray-800 mb-2">1000 Followers</h6>
              <div class="grid grid-cols-2 gap-1">
                  <!-- Follower 1 -->
                  <button class="flex flex-col items-center">
                    <img src="https://via.placeholder.com/40" alt="Follower 1" class="w-10 h-10 rounded-full mb-2">
                    <p class="text-gray-600">Follower1</p>
                  </button>
                  <!-- Follower 2 -->
                  <button class="flex flex-col items-center">
                    <img src="https://via.placeholder.com/40" alt="Follower 2" class="w-10 h-10 rounded-full mb-2">
                    <p class="text-gray-600">Follower2</p>
                  </button>
                  <!-- Follower 3 -->
                  <button class="flex flex-col items-center">
                    <img src="https://via.placeholder.com/40" alt="Follower 3" class="w-10 h-10 rounded-full mb-2">
                    <p class="text-gray-600">Follower3</p>
                  </button>
                  <!-- Follower 4 -->
                  <button class="flex flex-col items-center">
                    <img src="https://via.placeholder.com/40" alt="Follower 4" class="w-10 h-10 rounded-full mb-2">
                    <p class="text-gray-600">Follower4</p>
                  </button>
                  <!-- Follower 5 -->
                  <button class="flex flex-col items-center">
                    <img src="https://via.placeholder.com/40" alt="Follower 5" class="w-10 h-10 rounded-full mb-2">
                    <p class="text-gray-600">Follower5</p>
                  </button>
                  <!-- Follower 6 -->
                  <button class="flex flex-col items-center">
                    <img src="https://via.placeholder.com/40" alt="Follower 6" class="w-10 h-10 rounded-full mb-2">
                    <p class="text-gray-600">Follower6</p>
                  </button>
                  <br><br>
                  <!-- Show More Button -->
                  <button class="text-gray-600 hover:underline focus:outline-none">Show More</button>
              </div>
          </div>

          
      </div>

      <!-- Main Content Area -->
      <div class="flex-1 p-4 bg-white">
          <!-- Article Section -->
          <article class="mb-8">
              <h2 class="text-lg font-semibold text-gray-800 mb-4">Posts</h2>
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
          
          <!-- Events Section (Visible on small screens) -->
          <div class="lg:hidden mb-8">
              <h2 class="text-lg font-semibold text-gray-800 mb-2">Events</h2>
              <div class="text-gray-600 p-4">
                  <p class="mb-2">Upcoming Event: Event Name</p>
                  <p class="mb-2">Date: January 1, 2024</p>
                  <p class="mb-2">Time: 6:00 PM - 9:00 PM</p>
                  <p>Venue: Event Venue, City</p>
                  <!-- Interested Button -->
                  <button class="bg-green-700 text-white px-2 py-1 rounded mt-2">Interested</button>
              </div>
          </div>
          <!-- Followers Section with Avatar Images -->
          <div class="lg:hidden mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Followers</h2>
            <h6 class="italic text-gray-800 mb-2">1000 Followers</h6>
            <div class="grid grid-cols-3 gap-1">
                <!-- Follower 1 -->
                <button class="flex flex-col items-center">
                  <img src="https://via.placeholder.com/40" alt="Follower 1" class="w-10 h-10 rounded-full mb-2">
                  <p class="text-gray-600">Follower1</p>
                </button>
                <!-- Follower 2 -->
                <button class="flex flex-col items-center">
                  <img src="https://via.placeholder.com/40" alt="Follower 2" class="w-10 h-10 rounded-full mb-2">
                  <p class="text-gray-600">Follower2</p>
                </button>
                <!-- Follower 3 -->
                <button class="flex flex-col items-center">
                  <img src="https://via.placeholder.com/40" alt="Follower 3" class="w-10 h-10 rounded-full mb-2">
                  <p class="text-gray-600">Follower3</p>
                </button>
                <!-- Follower 4 -->
                <button class="flex flex-col items-center">
                  <img src="https://via.placeholder.com/40" alt="Follower 4" class="w-10 h-10 rounded-full mb-2">
                  <p class="text-gray-600">Follower4</p>
                </button>
                <!-- Follower 5 -->
                <button class="flex flex-col items-center">
                  <img src="https://via.placeholder.com/40" alt="Follower 5" class="w-10 h-10 rounded-full mb-2">
                  <p class="text-gray-600">Follower5</p>
                </button>
                <!-- Follower 6 -->
                <button class="flex flex-col items-center">
                  <img src="https://via.placeholder.com/40" alt="Follower 6" class="w-10 h-10 rounded-full mb-2">
                  <p class="text-gray-600">Follower6</p>
                </button>
                <br><br>
                <!-- Show More Button -->
                <button class="text-gray-600 hover:underline focus:outline-none">Show More</button>
            </div>
          </div>

          <!-- Suggestions Section -->
          <div class="lg:hidden mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Suggestions</h2>
            <div class="space-y-4">
              <!-- Suggestion 1 -->
              <div class="flex items-center space-x-4 p-2">
                  <img src="https://via.placeholder.com/40" alt="Suggestion 1" class="w-10 h-10 rounded-full">
                  <div>
                      <p class="text-gray-800 font-semibold">Suggestion 1</p>
                      <button class="bg-green-700 text-white px-2 py-1 rounded">Follow</button>
                  </div>
              </div>
              <!-- Suggestion 2 -->
              <div class="flex items-center space-x-4 p-2">
                  <img src="https://via.placeholder.com/40" alt="Suggestion 2" class="w-10 h-10 rounded-full">
                  <div>
                      <p class="text-gray-800 font-semibold">Suggestion 2</p>
                      <button class="bg-green-700 text-white px-2 py-1 rounded">Follow</button>
                  </div>
              </div>
              <!-- Suggestion 3 -->
              <div class="flex items-center space-x-4 p-2">
                  <img src="https://via.placeholder.com/40" alt="Suggestion 3" class="w-10 h-10 rounded-full">
                  <div>
                      <p class="text-gray-800 font-semibold">Suggestion 3</p>
                      <button class="bg-green-700 text-white px-2 py-1 rounded">Follow</button>
                  </div>
              </div>
            </div>
          </div>
      </div>
      <div class="hidden lg:block lg:w-1/5 p-4">
        <!-- Suggestions Section -->
        <div class="mb-8">
          <h2 class="text-lg font-semibold text-gray-800 mb-2">Suggestions</h2>
          <div class="space-y-4">
            <!-- Suggestion 1 -->
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/40" alt="Suggestion 1" class="w-10 h-10 rounded-full">
                <div>
                    <p class="text-gray-800 font-semibold">Suggestion 1</p>
                    <button class="bg-green-700 text-white px-2 py-1 rounded">Follow</button>
                </div>
            </div>
            <!-- Suggestion 2 -->
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/40" alt="Suggestion 2" class="w-10 h-10 rounded-full">
                <div>
                    <p class="text-gray-800 font-semibold">Suggestion 2</p>
                    <button class="bg-green-700 text-white px-2 py-1 rounded">Follow</button>
                </div>
            </div>
            <!-- Suggestion 3 -->
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/40" alt="Suggestion 3" class="w-10 h-10 rounded-full">
                <div>
                    <p class="text-gray-800 font-semibold">Suggestion 3</p>
                    <button class="bg-green-700 text-white px-2 py-1 rounded">Follow</button>
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            &copy; 2023 Social Media Name. All rights reserved.
        </div>
    </footer>
  </body>
</template>