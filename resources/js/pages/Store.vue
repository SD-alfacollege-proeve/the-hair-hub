<script setup lang="ts">
import FrontLayout from '@/layouts/FrontLayout.vue';
import { Head } from '@inertiajs/vue3';

const products = [
    {
        id: 1,
        name: 'Shampoo',
        description: 'Hydraterende shampoo.',
        price: 9.99,
        image: '/images/shampoo.jpg',
    },
    {
        id: 2,
        name: 'Haarverf',
        description: 'Langhoudende haarkleuring.',
        price: 14.95,
        image: '/images/hairdye.jpg',
    },
    {
        id: 3,
        name: 'Conditioner',
        description: 'Geeft je haar meer volume.',
        price: 11.49,
        image: '/images/conditioner.jpg',
    },
];
</script>

<template>
    <FrontLayout>
        <Head title="Producten - Haircare shop">
            <link rel="preconnect" href="https://rsms.me/" />
            <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
        </Head>

        <div class="min-h-screen bg-white text-gray-800">
            <!-- Products -->
            <section class="container mx-auto px-4 py-16">
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="product in products"
                        :key="product.id"
                        class="overflow-hidden rounded-lg bg-white shadow-md transition-transform hover:-translate-y-1"
                    >
                        <img :src="product.image" :alt="product.name" class="h-52 w-full object-cover transition-transform hover:scale-105" />
                        <div class="p-4">
                            <h3 class="mb-2 text-xl font-semibold text-gray-800">{{ product.name }}</h3>
                            <p class="text-gray-600">{{ product.description }}</p>
                            <p class="mt-4 font-bold text-blue-600">€{{ product.price }}</p>
                            <p class="mt-4 font-bold ">Bestellen en ophalen alleen mogelijk in de salon.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </FrontLayout>
</template>
