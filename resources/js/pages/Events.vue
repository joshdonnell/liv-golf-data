<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue'
import { show } from '@/routes/events'
import { type BreadcrumbItem } from '@/types'

defineProps<{
  events?: App.Data.FullEventData[]
}>()

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Events',
    href: '#',
  },
]
</script>

<template>
  <Head title="Events" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <UBlogPosts>
      <UBlogPost
        v-for="event in events"
        :key="event.third_party_id"
        :title="event.event_name"
        :description="`${event.venue} ${event.venue_country}`"
        :image="event.poster ?? undefined"
        :date="event.start_date ?? undefined"
        :badge="event.result ? 'Completed' : 'Upcoming'"
        :to="show.url(event.id)"
      >
      </UBlogPost>
    </UBlogPosts>
  </AppLayout>
</template>
