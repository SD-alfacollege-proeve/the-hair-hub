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
const behandelingen = ref(['Knippen', 'Knippen en baard', 'Knippen en kleuren']);

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

const volgendeStap = () => {
  if (stap.value < 4) stap.value++;
};

const vorigeStap = () => {
  if (stap.value > 1) stap.value--;
};

const resetVelden = () => {
  werknemer.value = '';
  behandeling.value = '';
  datum.value = '';
  tijd.value = '';
  stap.value = 1;
};

const huidigeDatum = new Date().toISOString().split('T')[0];

// Simuleer afspraak
const submitAfspraak = () => {
  alert('Afspraak succesvol ingepland!');

  resetVelden();
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
            <input
              v-model="tijd"
              type="time"
              id="tijd"
              class="w-full p-3 border border-gray-300 rounded-md"
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
              v-if="stap < 4"
              @click="volgendeStap"
              :disabled="!isVolgendeStapEnabled"
              class="py-2 px-4 text-white bg-purple-700 rounded-md hover:bg-purple-600"
            >
              Volgende
            </button>

            <!-- afspraak maken -->
            <button
              v-if="stap === 4"
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
