<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="The Hair Hub - Professionele Kapsalon">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <div class="min-h-screen bg-gray-50 text-gray-900">
        <!-- Header -->
        <header class="sticky top-0 z-50 bg-white shadow-sm">
            <div class="container mx-auto flex items-center justify-between px-4 py-2">
                <div class="flex items-center">
                    <img src="/images/logo.png" alt="The Hair Hub Logo" class="h-12 w-12 rounded-full object-contain" />
                </div>

                <nav class="hidden items-center gap-6 md:flex">
                    <Link href="#" class="font-medium text-gray-800 transition-colors hover:text-purple-700"> Home </Link>
                    <Link href="#" class="font-medium text-gray-800 transition-colors hover:text-purple-700"> Producten </Link>
                </nav>

                <Link href="#" class="rounded bg-blue-700 px-5 py-1.5 font-semibold text-white transition-colors hover:bg-blue-800">
                    Afspraak Maken
                </Link>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="relative overflow-hidden bg-gray-900 text-white">
            <!-- Hero background image as an actual image element -->
            <img src="/images/hero.jpg" alt="Hero background" class="absolute inset-0 z-0 h-full w-full object-cover" />
            <div class="absolute inset-0 z-10 bg-black opacity-60"></div>
            <div class="relative z-20 container mx-auto px-4 py-20 text-center">
                <h1 class="mb-4 text-5xl font-bold">The Hair Hub</h1>
                <p class="mx-auto mb-8 max-w-2xl text-xl">Jouw bestemming voor professionele haarverzorging en styling in een ontspannen sfeer</p>
                <div class="flex flex-col justify-center gap-4 sm:flex-row">
                    <Link href="#" class="rounded border-2 border-white px-6 py-3 font-semibold text-white transition-colors hover:bg-white/10">
                        Over Ons
                    </Link>
                    <Link
                        href="#"
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
                Mannenkapsels
                <span class="absolute bottom-0 left-0 h-1 w-24 bg-purple-700"></span>
            </h2>
            <p class="mb-10 max-w-3xl text-lg text-gray-600">
                Bij The Hair Hub bieden we een breed scala aan herenkapsel services, van klassiek tot modern. Onze ervaren stylisten zorgen ervoor dat
                je met een perfect kapsel de deur uitgaat.
            </p>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Service Card 1 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-md transition-transform hover:-translate-y-1">
                    <div class="h-52 overflow-hidden">
                        <img
                            src="/images/man1.jpg"
                            alt="Klassieke herenkapsel"
                            class="h-full w-full object-cover transition-transform hover:scale-105"
                        />
                    </div>
                    <div class="p-4">
                        <h3 class="mb-2 text-xl font-semibold text-gray-800">Klassieke Kapsels</h3>
                        <p class="text-gray-600">Tijdloze en elegante kapsels voor de moderne heer. Perfect voor elke gelegenheid.</p>
                    </div>
                </div>

                <!-- Service Card 2 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-md transition-transform hover:-translate-y-1">
                    <div class="h-52 overflow-hidden">
                        <img
                            src="/images/man2.jpg"
                            alt="Moderne herenkapsel"
                            class="h-full w-full object-cover transition-transform hover:scale-105"
                        />
                    </div>
                    <div class="p-4">
                        <h3 class="mb-2 text-xl font-semibold text-gray-800">Moderne Styles</h3>
                        <p class="text-gray-600">Trendy en eigentijdse kapsels die jouw persoonlijkheid perfect weergeven.</p>
                    </div>
                </div>

                <!-- Service Card 3 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-md transition-transform hover:-translate-y-1">
                    <div class="h-52 overflow-hidden">
                        <img src="/images/man3.jpg" alt="Baard trimmen" class="h-full w-full object-cover transition-transform hover:scale-105" />
                    </div>
                    <div class="p-4">
                        <h3 class="mb-2 text-xl font-semibold text-gray-800">Baard Styling</h3>
                        <p class="text-gray-600">Professionele baard trimming en styling om je look compleet te maken.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="container mx-auto px-4 py-16">
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
                        Onze stylisten worden regelmatig bijgeschoold om op de hoogte te blijven van de nieuwste trends en technieken. We gebruiken
                        alleen hoogwaardige producten die goed zijn voor je haar en het milieu.
                    </p>
                    <p class="text-gray-700">Kom langs en ervaar het verschil bij The Hair Hub!</p>
                </div>

                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img src="/images/about.jpg" alt="The Hair Hub Salon" class="h-auto w-full" />
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 pt-12 pb-6 text-white">
            <div class="container mx-auto px-4">
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Column 1 -->
                    <div>
                        <h3 class="relative mb-4 pb-2 text-xl font-semibold">
                            The Hair Hub
                            <span class="absolute bottom-0 left-0 h-0.5 w-12 bg-purple-700"></span>
                        </h3>
                        <p class="mb-2">Openingstijden</p>
                        <p class="mb-1">Ma: 9:00 - 18:00</p>
                        <p class="mb-1">Di: 9:00 - 18:00</p>
                        <p class="mb-1">Wo: 9:00 - 18:00</p>
                        <p class="mb-1">Do: 9:00 - 18:00</p>
                        <p class="mb-1">Vr: 9:00 - 18:00</p>
                        <p class="mb-1">Za: 10:00 - 16:00</p>
                        <p class="mb-1">Zo: Gesloten</p>
                    </div>

                    <!-- Column 2 -->
                    <div>
                        <h3 class="relative mb-4 pb-2 text-xl font-semibold">
                            Pagina's
                            <span class="absolute bottom-0 left-0 h-0.5 w-12 bg-purple-700"></span>
                        </h3>
                        <ul class="space-y-2">
                            <li>
                                <Link href="#" class="text-gray-300 transition-colors hover:text-blue-500"> Producten </Link>
                            </li>
                            <li>
                                <Link href="#" class="text-gray-300 transition-colors hover:text-blue-500"> Privacy Beleid </Link>
                            </li>
                            <li>
                                <Link href="#" class="text-gray-300 transition-colors hover:text-blue-500"> Cookies </Link>
                            </li>
                            <li>
                                <Link href="#" class="text-gray-300 transition-colors hover:text-blue-500"> Contact </Link>
                            </li>
                        </ul>
                    </div>

                    <!-- Column 3 -->
                    <div>
                        <h3 class="relative mb-4 pb-2 text-xl font-semibold">
                            Contact
                            <span class="absolute bottom-0 left-0 h-0.5 w-12 bg-purple-700"></span>
                        </h3>
                        <div class="mb-3 flex items-start gap-2">
                            <span>Telefoon:</span>
                            <a href="tel:+31123456789" class="text-gray-300 transition-colors hover:text-blue-500"> +31 1 23456789 </a>
                        </div>
                        <div class="mb-3 flex items-start gap-2">
                            <span>Email:</span>
                            <a href="mailto:contact@example.com" class="text-gray-300 transition-colors hover:text-blue-500"> contact@example.com </a>
                        </div>
                        <div class="mb-3 flex items-start gap-2">
                            <span>Adres:</span>
                            <span class="text-gray-300">Kerkstraat 123, Amsterdam</span>
                        </div>
                    </div>
                </div>

                <div class="mt-10 flex flex-col items-center justify-between gap-4 border-t border-gray-700 pt-6 sm:flex-row">
                    <p class="text-gray-400">&copy; 2025 The Hair Hub. Alle rechten voorbehouden.</p>
                    <Link :href="route('login')" class="text-white transition-colors hover:text-blue-500"> Inloggen </Link>
                </div>
            </div>
        </footer>
    </div>
</template>
