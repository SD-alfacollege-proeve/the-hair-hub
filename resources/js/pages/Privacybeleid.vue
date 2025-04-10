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
                    <Link href="/producten" class="font-medium text-gray-800 transition-colors hover:text-purple-700"> Producten </Link>
                </nav>

                <Link href="#" class="rounded bg-blue-700 px-5 py-1.5 font-semibold text-white transition-colors hover:bg-blue-800">
                    Afspraak Maken
                </Link>
            </div>
        </header>

    <!-- privacybeleid -->
     
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
                        <table>
                          <p class="mb-2">Openingstijden</p>
                          <tr><td style="padding-right: 10px;">Ma:</td><td>9:00 - 18:00</td></tr>
                          <tr><td style="padding-right: 10px;">Di:</td><td>9:00 - 18:00</td></tr>
                          <tr><td style="padding-right: 10px;">Wo:</td><td>9:00 - 18:00</td></tr>
                          <tr><td style="padding-right: 10px;">Do:</td><td>9:00 - 18:00</td></tr>
                          <tr><td style="padding-right: 10px;">Vr:</td><td>9:00 - 18:00</td></tr>
                          <tr><td style="padding-right: 10px;">Za:</td><td>10:00 - 16:00</td></tr>
                          <tr><td style="padding-right: 10px;">Zo:</td><td>Gesloten</td></tr>
                        </table>
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
                                <Link href="/privacybeleid" class="text-gray-300 transition-colors hover:text-blue-500"> Privacy Beleid </Link>
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