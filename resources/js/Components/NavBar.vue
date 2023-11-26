<template>
    <nav class="bg-black border-b-4 border-green-800">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center">
                <img src="@/images/plain.png" class="h-8 mr-3" alt="Zenvue Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Zenvue</span>
            </a>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 bg-black md:flex-row md:space-x-8 md:mt-0 md:border-0">
                    <li>
                        <a href="/companies" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Uzņēmumi</a>
                    </li>
                    <li>
                        <a href="/products" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Produkti</a>
                    </li>
                    <li>
                        <a href="/chat" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Čats</a>
                    </li>
                    <li>
                        <a href="/calendar/events" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kalendārs</a>
                    </li>
                    <li>
                        <a href="/search" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Meklēšana</a>
                    </li>
                    <li>
                        <a href="/register" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Rēģistrācija</a>
                    </li>
                    <li>
                        <a href="/login" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pieslēgties</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "NavBar"
}
</script>

<style scoped>

</style>
