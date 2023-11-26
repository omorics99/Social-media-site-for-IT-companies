<template>
    <div class="bg-black">
        <HeaderComponent></HeaderComponent>
        <div class="font-bold text-white text-center p-10 container mx-auto">
            <h2 class="text-2xl m-4">Mūsu sadarbības partneri</h2>
            <div class="bg-black flex flex-wrap items-center justify-center">
                <div v-for="item in phpVariable" :key="item.id" class="p-2 w-1/4">
                    <div class="bg-green-800 p-4 rounded-md text-center hover:bg-green-600 justify-center">
                        <img src="@/images/logo.png" alt="Company Logo" class="mb-4 mx-auto">
                        <h1 class="text-2xl font-bold mb-2">{{ item.name }}</h1>
                        <a :href="'/companies/'+item.id" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-700">Uzzināt vairāk</a>
                    </div>
                </div>
            </div>
        </div>
        <FooterComponent></FooterComponent>
    </div>
</template>

<script>
import HeaderComponent from "@/Components/NavBar.vue";
import FooterComponent from "@/Components/Footer.vue";

export default {
    props: ['phpVariable'],
    components: {
        HeaderComponent,
        FooterComponent,
    },
}
</script>
