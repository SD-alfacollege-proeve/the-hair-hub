<script setup lang="ts">
import FrontLayout from '@/layouts/FrontLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

// Stap- en formulierbeheer
const stap = ref(1); 
const werknemer = ref('');
const behandeling = ref('');
const datum = ref('');
const tijd = ref('');

const werknemers = ref(['Lisa', 'Emma', 'Joost']);
const behandelingen = ref(['Knippen', 'Stylen', 'Wassen']);

const isStap1Voltooid = computed(() => werknemer.value !== '');
const isStap2Voltooid = computed(() => behandeling.value !== '');
const isStap3Voltooid = computed(() => datum.value !== '');
const isStap4Voltooid = computed(() => tijd.value !== '');

const isVolgendeStapEnabled = computed(() => {
  if (stap.value === 1) return isStap1Voltooid.value;
  if (stap.value === 2) return isStap2Voltooid.value;
  if (stap.value === 3) return isStap3Voltooid.value;
  if (stap.value === 4) return isStap4Voltooid.value;
  return false;
});

const naam = ref('');
const email = ref('');
const telefoon = ref('');

const isNameValid = computed(() => naam.value.trim() !== '');
const isEmailValid = computed(() => /\S+@\S+\.\S+/.test(email.value));  
const isPhoneValid = computed(() => /^[0-9]{10,15}$/.test(telefoon.value));  

// Maak afspraak werkt alleen als alle velden zijn ingevuld
const isSubmitEnabled = computed(() => isNameValid.value && isEmailValid.value && isPhoneValid.value);

const volgendeStap = () => {
  if (stap.value < 5) stap.value++;
};

const vorigeStap = () => {
  if (stap.value > 1) stap.value--;
};

const resetVelden = () => {
  werknemer.value = '';
  behandeling.value = '';
  datum.value = '';
  tijd.value = '';
  naam.value = '';
  email.value = '';
  telefoon.value = '';
  stap.value = 1;
};

const uren = ref(['9', '10', '11', '12', '13', '14', '15', '16', '17']);
const huidigeDatum = new Date().toISOString().split('T')[0];

// Simuleer afspraak
const submitAfspraak = () => {
  if (isSubmitEnabled.value) {
    alert('Afspraak succesvol ingepland!');
    resetVelden();
  }
};
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
          <!-- Werknemer kiezen -->
          <div v-if="stap === 1">
            <label for="werknemer" class="block text-sm font-semibold text-gray-700">Kies een werknemer</label>
            <select v-model="werknemer" id="werknemer" class="w-full p-3 border border-gray-300 rounded-md">
              <option v-for="werknemer in werknemers" :key="werknemer" :value="werknemer">{{ werknemer }}</option>
            </select>
          </div>

          <!-- Behandeling kiezen -->
          <div v-if="stap === 2">
            <label for="behandeling" class="block text-sm font-semibold text-gray-700">Kies een behandeling</label>
            <select v-model="behandeling" id="behandeling" class="w-full p-3 border border-gray-300 rounded-md">
              <option v-for="behandeling in behandelingen" :key="behandeling" :value="behandeling">{{ behandeling }}</option>
            </select>
          </div>

          <!-- Datum kiezen -->
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

          <!-- Tijd kiezen -->
          <div v-if="stap === 4">
            <label for="tijd" class="block text-sm font-semibold text-gray-700">Kies een tijd</label>
            <select v-model="tijd" id="tijd" name="time" class="w-full p-3 border border-gray-300 rounded-md" required>
              <option v-for="uur in uren" :key="uur" :value="uur">{{ uur }}:00</option>
            </select>
          </div>

          <!-- Stap 5: Gegevens invullen -->
          <div v-if="stap === 5">
            <label for="naam" class="block text-sm font-semibold text-gray-700">Uw naam</label>
            <input
              v-model="naam"
              id="naam"
              type="text"
              class="w-full p-3 border border-gray-300 rounded-md"
              placeholder="Vul uw naam in"
              required
            />
            <p v-if="!isNameValid" class="text-sm text-red-600">Naam is verplicht.</p>

            <label for="email" class="block text-sm font-semibold text-gray-700 mt-4">Uw e-mail</label>
            <input
              v-model="email"
              id="email"
              type="email"
              class="w-full p-3 border border-gray-300 rounded-md"
              placeholder="Vul uw e-mail in"
              required
            />
            <p v-if="!isEmailValid" class="text-sm text-red-600">Voer een geldig e-mailadres in.</p>

            <label for="telefoon" class="block text-sm font-semibold text-gray-700 mt-4">Voer een geldig telefoonnummer in.</label>
            <input
              v-model="telefoon"
              id="telefoon"
              type="tel"
              class="w-full p-3 border border-gray-300 rounded-md"
              placeholder="Vul uw telefoonnummer in"
              required
            />
            <p v-if="!isPhoneValid" class="text-sm text-red-600">Voer een geldig telefoonnummer in.</p>
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

            <!-- afspraak maken -->
            <button
              v-if="stap === 5"
              @click="submitAfspraak"
              :disabled="!isSubmitEnabled"
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
