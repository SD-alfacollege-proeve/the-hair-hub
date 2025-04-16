<script setup lang="ts">
import FrontLayout from '@/layouts/FrontLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <FrontLayout>
        <Head title="Cookiebeleid - Haircare shop">
            <link rel="preconnect" href="https://rsms.me/" />
            <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
        </Head>

        <div class="min-h-screen bg-white text-gray-800">
            <!-- Cookiebeleid -->
            <section class="container mx-auto px-4 py-16">
                <h2 class="relative mb-4 pb-2 text-3xl font-bold">
                    Cookiebeleid
                    <span class="absolute bottom-0 left-0 h-1 w-24 bg-purple-700"></span>
                </h2>
                <p class="mb-10 max-w-3xl text-lg text-gray-600">
                    Op deze pagina leggen we uit wat cookies zijn, welke cookies wij gebruiken, en wat jij kunt doen als je liever niet hebt dat bepaalde cookies geplaatst worden.
                </p>

                <div class="max-w-3xl text-gray-700 space-y-6 text-base leading-relaxed">
                    <div>
                        <h3 class="text-xl font-semibold text-purple-700 mb-2">Wat zijn cookies?</h3>
                        <p>Cookies zijn kleine tekstbestanden die door websites op jouw apparaat worden geplaatst. Ze helpen bij het onthouden van jouw voorkeuren en verbeteren je gebruikerservaring.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-purple-700 mb-2">Welke cookies gebruiken wij?</h3>
                        <ul class="list-disc list-inside space-y-1">
                            <li><strong>Functionele cookies:</strong> noodzakelijk voor de werking van de website.</li>
                            <li><strong>Analytische cookies:</strong> om te begrijpen hoe bezoekers de website gebruiken (bijv. via Google Analytics).</li>
                            <li><strong>Marketingcookies:</strong> alleen na toestemming, voor gepersonaliseerde advertenties via derden zoals Google of Facebook.</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-purple-700 mb-2">Beheer van cookies</h3>
                        <p>Je kunt jouw cookievoorkeuren beheren via de instellingen van je browser. Je kunt eerder gegeven toestemming intrekken of cookies volledig blokkeren, maar dit kan invloed hebben op de werking van de website.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-purple-700 mb-2">Privacy</h3>
                        <p>Persoonsgegevens die via cookies worden verzameld, worden zorgvuldig verwerkt in overeenstemming met ons <a href="/privacybeleid" class="text-purple-700 underline">privacybeleid</a>.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-purple-700 mb-2">Contact</h3>
                        <p>
                            Heb je vragen over ons cookiegebruik?<br>
                            Neem contact met ons op via <a href="mailto:contact@example.com" class="text-purple-700 underline">contact@example.com</a>.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </FrontLayout>
</template>
