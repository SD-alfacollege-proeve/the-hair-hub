<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
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
    }
}>();

const isRole = (role: 'admin' | 'employee' | 'user') => {
    return page.props.auth?.roles?.includes(role);
};

</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="border-sidebar-border/70 relative aspect-video overflow-hidden rounded-xl border">
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
                </div>
                <div class="border-sidebar-border/70 relative aspect-video overflow-hidden rounded-xl border">
                    <PlaceholderPattern />
                </div>
            </div>
            <div class="border-sidebar-border/70 relative min-h-[100vh] flex-1 rounded-xl border md:min-h-min">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>
