<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Werknemers',
        href: '/employees',
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="border-sidebar-border/70 relative flex-1 overflow-hidden rounded-xl border">
                <div class="relative p-4">
                    <h2 class="mb-4 text-xl font-semibold">Werknemers</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-neutral-800/50 text-left">
                                    <th class="px-4 py-3 font-medium">Naam</th>
                                    <th class="px-4 py-3 font-medium">Email</th>
                                    <th class="px-4 py-3 font-medium">Aangemaakt op</th>
                                    <th class="px-4 py-3 font-medium">Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="employee in $page.props.employees"
                                    :key="employee.id"
                                    class="border-t border-neutral-700/30 hover:bg-neutral-800/30"
                                >
                                    <td class="px-4 py-3">{{ employee.name }}</td>
                                    <td class="px-4 py-3">{{ employee.email }}</td>
                                    <td class="px-4 py-3">{{ new Date(employee.created_at).toLocaleDateString() }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex gap-2">
                                            <button class="rounded bg-blue-500/20 px-2 py-1 text-xs text-blue-400 hover:bg-blue-500/30">
                                                Bewerken
                                            </button>
                                            <button class="rounded bg-red-500/20 px-2 py-1 text-xs text-red-400 hover:bg-red-500/30">
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
