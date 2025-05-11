<script setup lang="ts">
import FrontLayout from '@/layouts/FrontLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import axios from 'axios';
//const huidigeDatum = new Date().toISOString().split('T')[0];
//const datum = ref('');

const props = defineProps<{
  appointment: {
    id: number;
    customer_name: string;
    email: string;
    phone_number: string;
    date: string;
    time: string;
    behandeling: string;
    producten: string[];
  };
}>();

const appointmentId = ref(props.appointment.id)
const customerName = ref(props.appointment.customer_name);
const email = ref(props.appointment.email);
const phoneNumber = ref(props.appointment.phone_number);
const datum = ref(props.appointment.date);
//const behandeling = ref(props.appointment.behandeling);
const tijd = ref(props.appointment.time);
//const producten = ref<string[]>(props.appointment.producten || []);


// For checkbox values (optional)
const producten = ref<string[]>(props.appointment.producten || []);

const huidigeDatum = new Date().toISOString().split('T')[0];

async function submitAfspraak(appointmentId) {
  

  try {
    await axios.put(`/afspraken/update/${appointmentId}`, {
      customer_name: customerName.value,
      email: email.value,
      phone_number: phoneNumber.value,
      date: datum.value,
      time: tijd.value,
      behandeling: behandeling.value,
      producten: producten.value,
    });

    resetVelden();
  } catch (err: any) {
    console.log(datum.value, tijd.value)
    console.error("Fout bij verzenden:", err.response?.data.errors.treatment_id[0] );
  }
}
</script>



<template>
    <div class="container mx-auto min-h-screen p-6">
      <h2 class="text-3xl font-bold mb-6">Bewerk Afspraak</h2>
  
      <div class="space-y-6">

       <div>
          <label for="werknemer" class="block text-sm font-semibold text-gray-700">Kies een werknemer</label>
          <select
            id="behandeling"
            class="w-full p-3 border border-gray-300 rounded-md"
          >
            <option  value=""></option>
            <option value="Knippen">Jan</option>
            <option value="Stylen">Jaap</option>
            <option value="Wassen">Joost</option>
          </select>
        </div>

        <!-- Behandeling -->
        <div>
          <label for="behandeling" class="block text-sm font-semibold text-gray-700">Kies een behandeling</label>
          <select
            id="behandeling"
            class="w-full p-3 border border-gray-300 rounded-md"
          >
            <option value=""></option>
            <option value="Knippen">Knippen</option>
            <option value="Stylen">Stylen</option>
            <option value="Wassen">Wassen</option>
          </select>
        </div>
  
        <!-- Tijd -->
        <div>
          <label for="tijd" class="block text-sm font-semibold text-gray-700">Kies een tijd</label>
          <select
            v-model="tijd"
            id="tijd"
            class="w-full p-3 border border-gray-300 rounded-md"
  
          >
            <option value="{{ tijd }}" selected>{{tijd}}</option>
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
  
        <!-- Producten toevoegen -->
        <div>
          <label class="block text-sm font-semibold text-gray-700">Selecteer producten</label>
          <div class="space-y-2">
            <div class="flex items-center space-x-2">
              <input type="checkbox" id="shampoo" class="form-checkbox" />
              <label for="shampoo" class="text-sm">Shampoo</label>
            </div>
            <div class="flex items-center space-x-2">
              <input type="checkbox" id="haarmasker" class="form-checkbox" />
              <label for="haarmasker" class="text-sm">Haarverf</label>
            </div>
            <div class="flex items-center space-x-2">
              <input type="checkbox" id="conditioner" class="form-checkbox" />
              <label for="conditioner" class="text-sm">Conditioner</label>
            </div>
            <div class="flex items-center space-x-2">
              <input type="checkbox" id="haargel" class="form-checkbox" />
              <label for="haargel" class="text-sm">Haarlak</label>
            </div>
            <div class="flex items-center space-x-2">
              <input type="checkbox" id="haarolie" class="form-checkbox" />
              <label for="haarolie" class="text-sm">Haarolie</label>
            </div>
          </div>
        </div>

          
      <div>
         <label for="naam" class="block text-sm font-semibold text-gray-700">Uw naam</label>
            <input
              v-model="customerName"
              id="naam"
              type="text"
              class="w-full p-3 border border-gray-300 rounded-md"
              placeholder="Vul uw naam in"
              required
            />
            <p v-if="!isNameValid" class="text-sm text-red-600">Naam is verplicht.</p>
      </div>

          <div>
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
          </div>

          <div>
            <label for="telefoon" class="block text-sm font-semibold text-gray-700 mt-4">Uw telefoonnummer</label>
            <input
              v-model="phoneNumber"
              id="telefoon"
              type="tel"
              class="w-full p-3 border border-gray-300 rounded-md"
              placeholder="Vul uw telefoonnummer in"
              required
            />
            <p v-if="!isPhoneValid" class="text-sm text-red-600">Voer een geldig telefoonnummer in (10-15 cijfers).</p>
          
          </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end">
          <button
            @click="submitAfspraak(appointmentId)"
            class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-500"
          >
            Update Afspraak
          </button>
        </div>
      </div>
    </div>
  </template>
  
  