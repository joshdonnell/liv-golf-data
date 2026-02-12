<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue'
import { type BreadcrumbItem } from '@/types'

const props = defineProps<{
  event: App.Data.FullEventData
}>()

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: props.event.event_name,
    href: '#',
  },
]
</script>

<template>
  <Head :title="event.event_name" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <UPageHero
      :title="event.event_name"
      :description="`${event.venue}, ${event.venue_country}, ${event.start_date}`"
    >
      <img
        v-if="event.poster"
        :src="event.poster"
        :alt="event.event_name"
      />
    </UPageHero>

    <div class="rounded-lg bg-gray-50 p-4 font-mono text-sm whitespace-pre dark:bg-gray-900">{{ event.result }}</div>
  </AppLayout>
</template>
