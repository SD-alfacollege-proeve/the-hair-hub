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
                    <Link href="/" class="font-medium text-gray-800 transition-colors hover:text-purple-700"> Home </Link>
                    <Link href="#" class="font-medium text-gray-800 transition-colors hover:text-purple-700"> Producten </Link>
                </nav>

                <Link href="#" class="rounded bg-blue-700 px-5 py-1.5 font-semibold text-white transition-colors hover:bg-blue-800">
                    Afspraak Maken
                </Link>
            </div>
        </header>
     </div>
</template>
