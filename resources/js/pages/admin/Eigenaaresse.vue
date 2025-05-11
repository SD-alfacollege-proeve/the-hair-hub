<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

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
    lastFiveAppointments: {
        id: number;
        customer_name: string;
        email: string;
        phone_number: string;
        appointment_date: string;
        service?: string;
        employee_name?: string;
    }[];
    workshifts: {
        id: number;
        employee_name: string;
        start_time: string;
        end_time: string;
    }[];
    users: {
        id: number;
        name: string;
        email: string;
        role: string;
    }[];
    usersCount: number;
    workshiftsCount: number;
    lastFiveAppointmentsCount: number;
}>();

const isRole = (role: 'admin' | 'employee' | 'user') => {
    return page.props.auth?.roles?.includes(role);
};

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
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <!-- Last Five Appointments -->
            <div v-if="isRole('admin')" class="border-sidebar-border/70 relative rounded-xl border p-4">
                <h2 class="text-xl font-semibold mb-4">Last Five Appointments</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div v-for="appointment in page.props.lastFiveAppointments" :key="appointment.id" class="p-4 border rounded-lg shadow">
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

            <!-- Workshifts -->
            <div v-if="isRole('admin')" class="border-sidebar-border/70 relative rounded-xl border p-4">
                <h2 class="text-xl font-semibold mb-4">Workshifts</h2>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employee</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="shift in page.props.workshifts" :key="shift.id" class="bg-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ shift.employee_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ shift.start_time }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ shift.end_time }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Users -->
            <div v-if="isRole('admin')" class="border-sidebar-border/70 relative rounded-xl border p-4">
                <h2 class="text-xl font-semibold mb-4">Users</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div v-for="user in page.props.users" :key="user.id" class="p-4 border rounded-lg shadow">
                        <div class="font-medium">{{ user.name }}</div>
                        <div class="text-sm">{{ user.email }}</div>
                        <div class="text-xs text-gray-400">{{ user.role }}</div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>