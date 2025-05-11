<script setup lang="ts">
import FrontLayout from '@/layouts/FrontLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import axios from "axios";

const flashMessage = ref<string | null>(null);

// Form state
const stap = ref(1); 
const werknemer = ref<number | null>(null);
const behandeling = ref<number | null>(null);
const datum = ref('');
const tijd = ref('');
const naam = ref('');
const email = ref('');
const telefoon = ref('');

const werknemers = ref([
  { id: 1, name: "joost" },
  { id: 2, name: "emma" },
  { id: 3, name: "lisa" }
]);

const behandelingen = ref([
  { id: 1, name: 'Knippen' },
  { id: 2, name: 'Stylen' },
  { id: 3, name: 'Wassen' }
]);

const uren = ref(['09:00', '10:00', '11:00', '12:00','13:00', '14:00', '15:00', '16:00', '17:00']);

const Errors = ref<string[]>([]);

// Validation
const isStap1Voltooid = computed(() => werknemer.value !== null);
const isStap2Voltooid = computed(() => behandeling.value !== null);
const isStap3Voltooid = computed(() => datum.value !== '');
const isStap4Voltooid = computed(() => tijd.value !== '');

const isVolgendeStapEnabled = computed(() => {
  if (stap.value === 1) return isStap1Voltooid.value;
  if (stap.value === 2) return isStap2Voltooid.value;
  if (stap.value === 3) return isStap3Voltooid.value;
  if (stap.value === 4) return isStap4Voltooid.value;
  return false;
});

const isNameValid = computed(() => naam.value.trim() !== '');
const isEmailValid = computed(() => /\S+@\S+\.\S+/.test(email.value));
const isPhoneValid = computed(() => /^[0-9]{10,15}$/.test(telefoon.value));

const isSubmitEnabled = computed(() => isNameValid.value && isEmailValid.value && isPhoneValid.value);

// Navigation
const volgendeStap = () => {
  if (stap.value < 5) stap.value++;
};

const vorigeStap = () => {
  if (stap.value > 1) stap.value--;
};

const resetVelden = () => {
  werknemer.value = null;
  behandeling.value = null;
  datum.value = '';
  tijd.value = '';
  naam.value = '';
  email.value = '';
  telefoon.value = '';
  stap.value = 1;
  Errors.value = [];
};

const huidigeDatum = new Date().toISOString().split('T')[0];

async function submitAfspraak() {
  try {
    await axios.post("/afspraken/create", {
      user_id: werknemer.value,
      treatment_id: behandeling.value,
      date: datum.value,
      time: tijd.value,
      customer_name: naam.value,
      email: email.value,
      phone_number: telefoon.value,
    }).then(response => {
             flashMessage.value = response.data.message;
             console.log(flashMessage)
             setTimeout(() => {
                window.location.href = "http://localhost/"
              }, 4000);
            })

    resetVelden();
  } catch (err: any) {
    const responseData = err.response?.data;

if (responseData?.errors) {
  console.log(responseData?.errors)
  Errors.value = Object.values(responseData.errors).flat();
} else if (responseData?.message) {
  
  Errors.value = [responseData.message];
}
    console.error("Fout bij verzenden:", err);
  }
}

</script>

<template>
  <FrontLayout>
    <Head title="Afspraken - Haircare Shop">
      <link rel="preconnect" href="https://rsms.me/" />
      <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <div class="min-h-screen bg-white text-gray-800">
      <section class="container mx-auto px-4 py-16">
        <h2 class="relative mb-4 pb-2 text-3xl font-bold">
          Afspraken inplannen
          <span class="absolute bottom-0 left-0 h-1 w-24 bg-purple-700"></span>
        </h2>
        <p class="mb-10 max-w-3xl text-lg text-gray-600">
          Maak snel een afspraak voor jouw gewenste datum en tijd.
        </p>

         
        <div class="max-w-3xl text-gray-700 space-y-6 text-base leading-relaxed">
        <div v-if="Errors.length" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
              <ul class="mt-2 list-disc list-inside">
                <li v-for="(error, index) in Errors" :key="index">{{ error }}</li>
              </ul>
              
            </div>
             <div v-if="flashMessage" class="p-3 bg-green-200 text-green-800 rounded">
                {{ flashMessage }}
            </div>
          <!-- Stap 1 -->
          <div v-if="stap === 1">
            <label for="werknemer" class="block text-sm font-semibold text-gray-700">Kies een werknemer</label>
            <select v-model="werknemer" id="werknemer" class="w-full p-3 border border-gray-300 rounded-md">
              <option v-for="werknemer in werknemers" :key="werknemer.id" :value="werknemer.id">{{ werknemer.name }}</option>
            </select>
          </div>

          <!-- Stap 2 -->
          <div v-if="stap === 2">
            <label for="behandeling" class="block text-sm font-semibold text-gray-700">Kies een behandeling</label>
            <select v-model="behandeling" id="behandeling" class="w-full p-3 border border-gray-300 rounded-md">
              <option v-for="behandeling in behandelingen" :key="behandeling.id" :value="behandeling.id">{{ behandeling.name }}</option>
            </select>
          </div>

          <!-- Stap 3 -->
          <div v-if="stap === 3">
            <label for="datum" class="block text-sm font-semibold text-gray-700">Kies een datum</label>
            <input
              v-model="datum"
              name="date"
              type="date"
              id="datum"
              class="w-full p-3 border border-gray-300 rounded-md"
              required
              :min="huidigeDatum"
            />
          </div>

          <!-- Stap 4 -->
          <div v-if="stap === 4">
            <label for="tijd" class="block text-sm font-semibold text-gray-700">Kies een tijd</label>
            <select v-model="tijd" id="tijd" name="time" class="w-full p-3 border border-gray-300 rounded-md" required>
              <option v-for="uur in uren" :key="uur" :value="uur">{{ uur }}</option>
            </select>
          </div>

          <!-- Stap 5 -->
          <div v-if="stap === 5">
            <!-- Error Box -->
           
            <label for="naam" class="block text-sm font-semibold text-gray-700">Uw naam</label>
            <input
              v-model="naam"
              id="naam"
              type="text"
              class="w-full p-3 border border-gray-300 rounded-md"
              placeholder="Vul uw naam in"
              required
            />
           

            <label for="email" class="block text-sm font-semibold text-gray-700 mt-4">Uw e-mail</label>
            <input
              v-model="email"
              id="email"
              type="email"
              class="w-full p-3 border border-gray-300 rounded-md"
              placeholder="Vul uw e-mail in"
              required
            />
            

            <label for="telefoon" class="block text-sm font-semibold text-gray-700 mt-4">Voer een geldig telefoonnummer in.</label>
            <input
              v-model="telefoon"
              id="telefoon"
              type="tel"
              class="w-full p-3 border border-gray-300 rounded-md"
              placeholder="Vul uw telefoonnummer in"
              required
            />
           
          </div>

          <!-- Navigatie -->
          <div class="mt-6 flex justify-between">
            <button
              v-if="stap > 1"
              @click="vorigeStap"
              class="py-2 px-4 text-white bg-gray-500 rounded-md hover:bg-gray-400"
            >
              Vorige
            </button>

            <button
              v-if="stap < 5"
              @click="volgendeStap"
              :disabled="!isVolgendeStapEnabled"
              class="py-2 px-4 text-white bg-purple-700 rounded-md hover:bg-purple-600"
            >
              Volgende
            </button>

            <button
              v-if="stap === 5"
              
              @click="submitAfspraak"
              class="py-2 px-4 text-white bg-green-700 rounded-md hover:bg-green-600"
            >
              Maak afspraak
            </button>
          </div>
        </div>
      </section>
    </div>
  </FrontLayout>
</template>
