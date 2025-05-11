<script setup lang="ts">
import FrontLayout from '@/layouts/FrontLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <FrontLayout>
        <Head title="The Hair Hub - Professionele Kapsalon">
            <link rel="preconnect" href="https://rsms.me/" />
            <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
        </Head>

        <div class="min-h-screen bg-gray-50 text-gray-900">
            <!-- Hero Section -->
            <section class="relative overflow-hidden bg-gray-900 text-white">
                <!-- Hero background image as an actual image element -->
                <img src="/images/header.jpg" alt="Hero background" class="absolute inset-0 z-0 h-full w-full object-cover" />
                <div class="absolute inset-0 z-10 bg-black opacity-60"></div>
                <div class="relative z-20 container mx-auto px-4 py-20 text-center">
                    <h1 class="mb-4 text-5xl font-bold">The Hair Hub</h1>
                    <p class="mx-auto mb-8 max-w-2xl text-xl">Jouw bestemming voor professionele haarverzorging en styling in een ontspannen sfeer</p>
                    <div class="flex flex-col justify-center gap-4 sm:flex-row">
                        <Link href="#about" class="rounded border-2 border-white px-6 py-3 font-semibold text-white transition-colors hover:bg-white/10">
                            Over Ons
                        </Link>
                        <Link
                            :href="route('afspraken')"
                            class="rounded border-2 border-blue-700 bg-blue-700 px-6 py-3 font-semibold text-white transition-colors hover:border-blue-800 hover:bg-blue-800"
                        >
                            Afspraak Maken
                        </Link>
                    </div>
                </div>
            </section>

            <!-- Services Section -->
            <section class="container mx-auto px-4 py-16">
                <h2 class="relative mb-4 pb-2 text-3xl font-bold">
                    Behandelingen
                    <span class="absolute bottom-0 left-0 h-1 w-24 bg-purple-700"></span>
                </h2>
                <p class="mb-10 max-w-3xl text-lg text-gray-600">
                    Bij The Hair Hub bieden we een breed scala van behandelingen aan, van klassiek tot modern. Onze ervaren stylisten zorgen ervoor
                    dat je met een perfect kapsel de deur uitgaat.
                </p>

                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Service Card 1 -->
                    <div class="overflow-hidden rounded-lg bg-white shadow-md transition-transform hover:-translate-y-1">
                        <div class="h-52 overflow-hidden">
                            <img
                                src="/images/knippen.jpg"
                                alt="Knippen"
                                class="h-full w-full object-cover transition-transform hover:scale-105"
                            />
                        </div>
                        <div class="p-4">
                            <h3 class="mb-2 text-xl font-semibold text-gray-800">Knippen</h3>
                            <p class="text-gray-600">Trendy en eigentijdse kapsels knippen.</p>
                        </div>
                    </div>

                    <!-- Service Card 2 -->
                    <div class="overflow-hidden rounded-lg bg-white shadow-md transition-transform hover:-translate-y-1">
                        <div class="h-52 overflow-hidden">
                            <img
                                src="/images/stylen2.jpg"
                                alt="Stylen"
                                class="h-full w-full object-cover transition-transform hover:scale-105"
                            />
                        </div>
                        <div class="p-4">
                            <h3 class="mb-2 text-xl font-semibold text-gray-800">Stylen</h3>
                            <p class="text-gray-600">Trendy en eigentijdse kapsels stylen.</p>
                        </div>
                    </div>

                    <!-- Service Card 3 -->
                    <div class="overflow-hidden rounded-lg bg-white shadow-md transition-transform hover:-translate-y-1">
                        <div class="h-52 overflow-hidden">
                            <img src="/images/wassen.jpg" alt="Baard trimmen" class="h-full w-full object-cover transition-transform hover:scale-105" />
                        </div>
                        <div class="p-4">
                            <h3 class="mb-2 text-xl font-semibold text-gray-800">Wassen</h3>
                            <p class="text-gray-600">Wassen van uw haren kan hier ook.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- About Section -->
            <section id="about" class="container mx-auto px-4 py-16">
                <div class="grid items-center gap-8 md:grid-cols-2">
                    <div>
                        <h2 class="relative mb-4 pb-2 text-3xl font-bold">
                            Over ons
                            <span class="absolute bottom-0 left-0 h-1 w-24 bg-purple-700"></span>
                        </h2>
                        <p class="mb-6 text-lg text-gray-600">The Hair Hub is een kapsalon met een passie voor kwaliteit en klanttevredenheid.</p>
                        <p class="mb-4 text-gray-700">
                            Bij The Hair Hub geloven we dat een goed kapsel meer is dan alleen een knipbeurt - het is een ervaring. Sinds onze opening
                            streven we ernaar om elke klant te voorzien van persoonlijke aandacht en stijladvies op maat.
                        </p>
                        <p class="mb-4 text-gray-700">
                            Onze stylisten worden regelmatig bijgeschoold om op de hoogte te blijven van de nieuwste trends en technieken. We
                            gebruiken alleen hoogwaardige producten die goed zijn voor je haar en het milieu.
                        </p>
                        <p class="text-gray-700">Kom langs en ervaar het verschil bij The Hair Hub!</p>
                    </div>

                    <div class="overflow-hidden rounded-lg shadow-lg">
                        <img src="/images/stylen.jpg" alt="The Hair Hub Salon" class="h-auto w-full" />
                    </div>
                </div>
            </section>
        </div>
    </FrontLayout>
</template>
