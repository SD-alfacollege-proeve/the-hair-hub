<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { BookOpen, Calendar, FileText, Folder, LayoutGrid, ShoppingBasket, User, Users } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';

const { props } = usePage();
//@ts-expect-error not defined
const userRoles = props.auth.user.roles.map((role) => role.name);

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    ...(userRoles.includes('admin')
        ? [
              {
                  title: 'Producten',
                  href: '/products',
                  icon: ShoppingBasket,
              },
              {
                  title: 'Werknemers',
                  href: '/employees',
                  icon: Users,
              },
              {
                  title: 'Klanten',
                  href: '/customers',
                  icon: User,
              },

              {
                title: 'Facturen',
                href: '/invoices',
                icon: FileText,
              },
          ]
        : []),

    {
        title: 'Afspraken',
        href: '/appointments',
        icon: Calendar,
    },
];


</script>

<template>
    <Sidebar variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
