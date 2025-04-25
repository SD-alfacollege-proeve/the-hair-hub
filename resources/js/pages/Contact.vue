<script setup lang="ts">
import { ref } from 'vue';
import FrontLayout from '@/layouts/FrontLayout.vue';
import { Head } from '@inertiajs/vue3';

const name = ref('');
const email = ref('');
const message = ref('');
const success = ref(false);

const handleSubmit = () => {
    console.log('Formulier verzonden:', {
        name: name.value,
        email: email.value,
        message: message.value
    });

    success.value = true;

    name.value = '';
    email.value = '';
    message.value = '';
};
</script>


<template>
    <FrontLayout>
        <Head title="Producten - Haircare shop">
            <link rel="preconnect" href="https://rsms.me/" />
            <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
        </Head>

        <!-- Contact formulier -->
         
        <section id="about" class="container mx-auto px-4 py-16">
                <div class="grid items-center gap-20 md:grid-cols-2 ">
  
                    <div class="overflow-hidden rounded-lg shadow-lg">
                        <img src="/images/knippen.jpg" alt="The Hair Hub Salon" class="h-auto w-full" />
                    </div>

                    <div class="mt-10">
                        <h2 class="relative mb-4 pb-2 text-3xl font-bold">
                            Contact
                            <span class="absolute bottom-0 left-0 h-1 w-24 bg-purple-700"></span>
                        </h2>
                        <form @submit.prevent="handleSubmit" class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                                <input v-model="name" type="text" id="name" required class="mt-1 block w-1/2 border-gray-300 shadow-sm ring rounded-md focus:border-purple-500 focus:ring focus:ring-purple-200 pl-2 h-8  " />
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">E-mailadres</label>
                                <input v-model="email" type="email" id="email" required class="mt-1 block w-1/2 border-gray-300 shadow-sm ring rounded-md focus:border-purple-500 focus:ring focus:ring-purple-200 pl-2 h-8" />
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">Bericht</label>
                                <textarea v-model="message" id="message" rows="4" required class="mt-1 block w-1/2 border-gray-300 shadow-sm ring rounded-md focus:border-purple-500 focus:ring focus:ring-purple-200 pl-2"></textarea>
                            </div>

                            <button type="submit" class="inline-flex items-center px-6 py-2 rounded-md bg-green-700 text-white hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                Verstuur
                            </button>

                            <p v-if="success" class="text-green-600">We nemen zo snel mogelijk contact met je op!</p>
                        </form>
                    </div>

                </div>
        </section>
    </FrontLayout>
</template>
