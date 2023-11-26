<template>
    <body class="bg-gray-800">
    <HeaderComponent></HeaderComponent>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-center text-2xl text-white">{{phpVariable.name}}</h1>
        <div class="p-4 text-white">
            <div class="w-full max-w-lg mx-auto ">
                <p class="">{{phpVariable.description}}</p>
                <img src="@/images/logo.png" alt="Business Logo" class="w-20 h-auto mt-8">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-800">{{parentCompany.name}}</h1>
                    <p class=""><strong>E-pasts:</strong> {{parentCompany.email}}</p>
                    <p class=""><strong>Telefons:</strong> {{parentCompany.phone}}</p>
                    <strong>Mājaslapa: </strong><a :href="parentCompany.website_link" target="_blank">{{parentCompany.website_link}}</a>
                </div>
            </div>
        </div>

    </div>
    <FooterComponent></FooterComponent>
    </body>
</template>

<script>
import HeaderComponent from "@/Components/NavBar.vue";
import FooterComponent from "@/Components/Footer.vue";

export default {
    props: ['phpVariable', 'parentCompany'],
    components: {
        HeaderComponent,
        FooterComponent,
    },
}
</script>
