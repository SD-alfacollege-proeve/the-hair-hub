<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const page = usePage<{
    auth: {
        roles: ('admin' | 'employee' | 'user')[];
    },
    appointments: {
        id: number;
        customer_name: string;
        email: string;
        phone_number: string;
        appointment_date: string;
        service?: string;
        employee_name?: string;
    }[];
}>();

const isRole = (role: 'admin' | 'employee' | 'user') => {
    return page.props.auth?.roles?.includes(role);
};

// Mock data for calendar
const employees = [
    { id: 1, name: 'Jan Jansen' },
    { id: 2, name: 'Emma van Dijk' },
    { id: 3, name: 'Sophie de Boer' },
];

// Processed calendar appointments
const appointmentsGroupedByTime = computed(() => {
    const groupedAppointments: Record<string, Array<{
        id: number;
        customer_name: string;
        email: string;
        employee_name: string;
        service?: string;
    }>> = {};
    
    if (page.props.appointments && page.props.appointments.length) {
        page.props.appointments.forEach((appointment) => {
            const time = appointment.appointment_date.split(' ')[1]?.substring(0, 5) || '00:00';
            
            if (!groupedAppointments[time]) {
                groupedAppointments[time] = [];
            }
            
            groupedAppointments[time].push({
                id: appointment.id,
                customer_name: appointment.customer_name,
                email: appointment.email,
                employee_name: appointment.employee_name || 'Unassigned',
                service: appointment.service || 'Appointment'
            });
        });
    }
    
    return groupedAppointments;
});
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <!-- <div class="border-sidebar-border/70 relative aspect-video overflow-hidden rounded-xl border">
                    <div>
                        <div class="relative">
                            <div v-if="isRole('employee')">Welkom, werknemer!</div>
                            <div v-else-if="isRole('admin')">Welkom, admin!</div>
                            <div v-else-if="isRole('user')">Welkom, gebruiker!</div>
                        </div>
                    </div>
                </div>
                <div class="border-sidebar-border/70 relative aspect-video overflow-hidden rounded-xl border">
                    <PlaceholderPattern />
                </div>-->
                <div v-if="isRole('admin')" class="border-sidebar-border/70 relative aspect-video overflow-hidden rounded-xl border">
                    <!-- Recent Appointments Block (Smaller) -->
                    <h2 class="text-xl font-semibold mb-4">Recent Appointments</h2>
                    <div class="overflow-y-auto max-h-64">
                        <div v-for="appointment in page.props.appointments" :key="appointment.id" 
                            class="mb-3 p-3 border border-neutral-700/30 rounded-lg hover:bg-neutral-800/30">
                            <div class="font-medium">{{ appointment.customer_name }}</div>
                            <div class="text-sm">{{ appointment.appointment_date }}</div>
                            <div class="text-xs text-gray-400">{{ appointment.email }}</div>
                            <div class="mt-2 flex gap-2">
                                <button class="text-xs text-blue-400 hover:underline">View</button>
                                <button class="text-xs text-green-400 hover:underline">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Calendar Block -->
            <div v-if="isRole('admin')" class="border-sidebar-border/70 relative rounded-xl border p-4 mb-4">
                <h2 class="text-xl font-semibold mb-4">Today's Appointments Calendar</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="border-b border-neutral-700/30">
                            <tr>
                                <th class="px-4 py-2 w-1/12">Time</th>
                                <th class="px-4 py-2 w-3/12 text-center" v-for="employee in employees" :key="employee.id">
                                    {{ employee.name }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(group, time) in appointmentsGroupedByTime" :key="time" class="border-t border-neutral-700/30">
                                <td class="px-4 py-3 font-medium">{{ time }}</td>
                                <td v-for="employee in employees" :key="employee.id" class="px-4 py-3">
                                    <div v-for="appt in group" :key="appt.id" 
                                        class="p-2 bg-blue-800/20 rounded border border-blue-700/30 mb-2">
                                        <div class="font-medium">{{ appt.customer_name }}</div>
                                        <div class="text-sm text-gray-300">{{ appt.service || 'Appointment' }}</div>
                                        <div class="text-xs text-gray-400">{{ appt.email }}</div>
                                        <div class="text-xs mt-1">{{ appt.employee_name }}</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
