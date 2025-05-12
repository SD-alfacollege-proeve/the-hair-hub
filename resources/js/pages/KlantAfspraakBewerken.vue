<script setup lang="ts">
import FrontLayout from '@/layouts/FrontLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import axios from 'axios';

const flashMessage = ref<string | null>(null);
const Errors = ref<string[]>([]);

const props = defineProps<{
  appointment: {
    id: number;
    customer_name: string;
    email: string;
    phone_number: string;
    date: string;
    time: string;
    pickedTreatment: object;
    pickedBarber: object;
    treatments: object;
    employees: object
  };
}>();

const appointmentId = ref(props.appointment.id)
const customerName = ref(props.appointment.customer_name);
const email = ref(props.appointment.email);
const phoneNumber = ref(props.appointment.phone_number);
const datum = ref(props.appointment.date);
const behandeling = ref(props.appointment.pickedTreatment.id); 
const werknemer = ref(props.appointment.pickedBarber.id);
const behandelingen = props.appointment.treatments
const tijd = ref(props.appointment.time.slice(0, 5));

const werknemers = props.appointment.employees
console.log(tijd.value)

const huidigeDatum = new Date().toISOString().split('T')[0];

function deleteAfspraak(appointment: number) {
      if (!confirm("Weet je zeker dat je deze afspraak wilt verwijderen?")) return;

      axios.delete(`/afspraken/klant/delete/${appointment}`)
        .then(response => {
             flashMessage.value = response.data.message;
           setTimeout(() => {
          window.location.href = "http://localhost";
        }, 2000);
        })
        .catch(err => {
          console.error('Verwijderen mislukt:', err.response || err);
        });
    }

async function submitAfspraak(appointment) {
  
  try {
    await axios.put(`/afspraken/update/${appointment}`, {
      customer_name: customerName.value,
      email: email.value,
      phone_number: phoneNumber.value,
      date: datum.value,
      time: tijd.value,
      user_id: werknemer.value,
      treatment_id: behandeling.value,
    }).then(response => {
      if(response.data.redirect){
          window.scrollTo({ top: 0, behavior: "auto"});
          flashMessage.value = response.data.message
          setTimeout(() => {
                window.location.href = "http://localhost/afspraken"
                
              }, 4000);
      }
    })

    resetVelden();
  } catch (err: any) {
     window.scrollTo({ top: 0, behavior: "auto"});
    console.log(datum.value, tijd.value)
    const responseData = err.response?.data;
   if (responseData?.errors) {
  console.log(responseData?.errors)
  Errors.value = Object.values(responseData.errors).flat();
} else if (responseData?.message) {
  
  Errors.value = [responseData.message];
}
    console.error("Fout bij verzenden:", err.response);
  }
}
</script>



<template>
    <div class="container mx-auto min-h-screen p-6">
      <h2 class="text-3xl font-bold mb-6">Bewerk Afspraak</h2>
      <div v-if="flashMessage" class="p-3 bg-green-200 text-green-800 rounded">
                {{ flashMessage }}
            </div>

            <div v-if="Errors.length" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
              <ul class="mt-2 list-disc list-inside">
                <li v-for="(error, index) in Errors" :key="index">{{ error }}</li>
              </ul>
              
            </div>
      <div class="space-y-6">

       <div>
        <label for="werknemer" class="block text-sm font-semibold text-gray-700">Kies een werknemer</label>
            <select v-model="werknemer" id="werknemer" class="w-full p-3 border border-gray-300 rounded-md">
              <option v-for="werknemer in werknemers" :key="werknemer.id" :value="werknemer.id">{{ werknemer.name }}</option>
            </select>
          
          
        </div>

        <!-- Behandeling -->
        <div>
          <label for="behandeling" class="block text-sm font-semibold text-gray-700">Kies een behandeling</label>
            <select v-model="behandeling" id="behandeling" class="w-full p-3 border border-gray-300 rounded-md">
              <option v-for="behandeling in behandelingen" :key="behandeling.id" :value="behandeling.id">{{ behandeling.name }}</option>
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
            <option disabled value="">Selecteer een tijd</option>
            <option value="9:00">9:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
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
            <p v-if="!isNameValid" class="text-sm text-red-600"></p>
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
            <p v-if="!isEmailValid" class="text-sm text-red-600"></p>
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
            <p v-if="!isPhoneValid" class="text-sm text-red-600"></p>
          
          </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end ">
        <button
            @click="deleteAfspraak(appointment.id)"
            class="px-6 py-3 bg-red-600 text-white rounded-md hover:bg-red-700 mx-4"
          >
            Verwijder afspraak
          </button>
          <button
            @click="submitAfspraak(appointment.id)"
            class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-500"
          >
            Update Afspraak
          </button>
        </div>
      </div>
    </div>
  </template>
  
  