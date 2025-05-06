<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';
import axios from 'axios';

const deleteAfspraak = async (id: number) => {
  if (confirm("Weet je zeker dat je deze afspraak wilt verwijderen?")) {
    try {
      await axios.delete(`/afspraken/delete/${id}`);
      if (response.data.redirect) {
    window.location.href = response.data.redirect; // This will trigger a full page refresh
}
    } catch (err) {
      console.error('Verwijderen mislukt:', err.response.data);
    }
  }
};

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const page = usePage<{
    auth: {
        roles: ('admin' | 'appointment' | 'user')[];
    }
}>();

</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                
            </div>
            <div class="border-sidebar-border/70 relative flex-1 overflow-hidden rounded-xl border">
                <div class="relative p-4">
                    <h2 class="mb-4 text-xl font-semibold">Afspraken</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-neutral-800/50 text-left">
                                    <th class="px-4 py-3 font-medium">Naam</th>
                                    <th class="px-4 py-3 font-medium">Email</th>
                                    <th class="px-4 py-3 font-medium">Telefoonnummer</th>
                                    <th class="px-4 py-3 font-medium">Afspraakdatum</th>
                                    <th class="px-4 py-3 font-medium">Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="appointment in $page.props.appointments"
                                    :key="appointment.id"
                                    class="border-t border-neutral-700/30 hover:bg-neutral-800/30"
                                >
                                    <td class="px-4 py-3">{{ appointment.customer_name }}</td>
                                    <td class="px-4 py-3">{{ appointment.email }}</td>
                                    <td class="px-4 py-3">{{ appointment.phone_number }}</td>
                                    <td class="px-4 py-3">{{ appointment.appointment_date }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex gap-2">
                                            <button class="rounded bg-blue-500/20 px-2 py-1 text-xs text-blue-400 hover:bg-blue-500/30">
                                                Bewerken
                                            </button>
                                            <button  @click="deleteAfspraak(appointment.id)" class="rounded bg-red-500/20 px-2 py-1 text-xs text-red-400 hover:bg-red-500/30" onclick="return confirm(weet je zeker dat je de afspraak van {{ appointment.customer_name }} om {{ appointment.appointment_date }} wilt verwijderen?)">
                                                Verwijderen
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>