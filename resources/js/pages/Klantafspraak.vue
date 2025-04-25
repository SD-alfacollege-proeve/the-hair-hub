<script setup lang="ts">
import FrontLayout from '@/layouts/FrontLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const huidigeDatum = new Date().toISOString().split('T')[0];
const datum = ref('');
</script>



<template>
    <div class="container mx-auto p-6">
      <h2 class="text-3xl font-bold mb-6">Bewerk Afspraak</h2>
  
      <div class="space-y-6">
        <!-- Behandeling -->
        <div>
          <label for="behandeling" class="block text-sm font-semibold text-gray-700">Kies een behandeling</label>
          <select
            id="behandeling"
            class="w-full p-3 border border-gray-300 rounded-md"
          >
            <option value="Knippen">Knippen</option>
            <option value="Stylen">Stylen</option>
            <option value="Wassen">Wassen</option>
          </select>
        </div>
  
        <!-- Tijd -->
        <div>
          <label for="tijd" class="block text-sm font-semibold text-gray-700">Kies een tijd</label>
          <select
            id="tijd"
            class="w-full p-3 border border-gray-300 rounded-md"
          >
            <option value="9">9:00</option>
            <option value="10">10:00</option>
            <option value="11">11:00</option>
            <option value="12">12:00</option>
            <option value="13">13:00</option>
            <option value="14">14:00</option>
            <option value="15">15:00</option>
            <option value="16">16:00</option>
            <option value="17">17:00</option>
          </select>
        </div>
  
        <!-- Datum -->
        <div>
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
  
        <!-- Submit Button -->
        <div class="mt-6 flex justify-end">
          <button
            class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-500"
          >
            Update Afspraak
          </button>
        </div>
      </div>
    </div>
  </template>
  
  