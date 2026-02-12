<script setup lang="ts">
import type { NavigationMenuItem } from '@nuxt/ui'
import { useCookies } from '@vueuse/integrations/useCookies'
import { dashboard } from '@/routes'
import type { BreadcrumbItem } from '@/types/navigation'

interface Props {
  breadcrumbs?: BreadcrumbItem[]
}

withDefaults(defineProps<Props>(), {
  breadcrumbs: () => [],
})

const page = usePage()
const sideBarState = useCookies(['sidebar_state'])
const items: NavigationMenuItem[] = [
  {
    label: 'Events',
    icon: 'i-lucide-layout-grid',
    href: dashboard.url(),
  },
]
</script>

<template>
  <UDashboardGroup>
    <UDashboardSidebar
      collapsible
      resizable
      :collapsed="!page.props.sidebarOpen"
      @update:collapsed="
        sideBarState.set('sidebar_state', sideBarState.get('sidebar_state') ? 'false' : 'true', {
          path: '/',
        })
      "
    >
      <template #header="">
        <AppLogo />
      </template>

      <template #default="{ collapsed }">
        <UNavigationMenu
          :collapsed="collapsed"
          :items="items"
          orientation="vertical"
        />
      </template>

      <template #footer="{ collapsed }">
        <UserMenu :collapsed="collapsed" />
      </template>
    </UDashboardSidebar>

    <UDashboardPanel resizable>
      <template #header>
        <UDashboardNavbar :title="breadcrumbs[0]?.title">
          <template #leading>
            <UDashboardSidebarCollapse />
          </template>
        </UDashboardNavbar>
      </template>

      <template #body>
        <slot />
      </template>
    </UDashboardPanel>
  </UDashboardGroup>
</template>
