<template>
    <div class="bg-black">
        <HeaderComponent></HeaderComponent>
        <div class="font-bold text-white text-center p-10 container mx-auto min-h-screen">
            <h2 class="text-2xl m-4">Pakalpojumi un produkti</h2>
            <div class="bg-black flex flex-wrap items-center justify-center">
                <div v-for="item in phpVariable" :key="item.id" class="p-2 w-1/2">
                    <div class="bg-green-800 p-4 rounded-md text-center hover:bg-green-600 justify-center">
                        <h2 class="text-2xl font-bold mb-2">{{ item.name }}</h2>
                        <p class="text-gray-100 mb-4">
                            {{ item.description.length >= 150 ? item.description.substring(0,150) + ".." : item.description }}
                        </p>
                        <a :href="'/products/'+item.id" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-700">Uzzināt vairāk</a>
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
