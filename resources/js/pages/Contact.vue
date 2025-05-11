<script setup lang="ts">
import { ref } from 'vue';
import FrontLayout from '@/layouts/FrontLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from "axios";
const name = ref('');
const email = ref('');
const message = ref('');
const success = ref(false);

const handleSubmit = async () => {
    try {
        await axios.post('/contact/store', {
            name: name.value,
            email: email.value,
            message: message.value,
        });

        success.value = true;

        // Clear fields after successful submission
        name.value = '';
        email.value = '';
        message.value = '';
    } catch (error) {
        console.error('Fout bij versturen:', error.response?.data || error.message);
    }
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
                                <label for="naam" class="block text-sm font-semibold text-gray-700">Uw naam</label>
                                <input v-model="name" type="text" id="name" required class=" p-3 border border-gray-300 rounded-md w-64 " />
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">E-mailadres</label>
                                <input v-model="email" type="email" id="email" required class=" p-3 border border-gray-300 rounded-md w-64" />
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">Bericht</label>
                                <textarea v-model="message" id="message" rows="4" required class=" p-3 border border-gray-300 rounded-md w-64"></textarea>
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
