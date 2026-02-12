<script setup lang="ts">
import { login, register } from '@/routes'

withDefaults(
  defineProps<{
    canRegister?: boolean
  }>(),
  {
    canRegister: true,
  },
)
</script>

<template>
  <Head title="Welcome to Liv Golf Data" />

  <UApp>
    <div class="flex min-h-screen flex-col items-center justify-center">
      <UPageHero
        title="LIV Golf Data"
        description="A simple Laravel application for showing results from the LIV golf tour. All results are pulled via from theSportsDB. "
        :links="[
          {
            label: 'Get started',
            to: register().url,

            trailingIcon: 'i-lucide-arrow-right',
            size: 'xl',
          },
          {
            label: 'Login',
            to: login.url(),
            trailingIcon: 'i-lucide-arrow-right',
            size: 'xl',
            color: 'neutral',
            variant: 'subtle',
          },
        ]"
      />
    </div>
  </UApp>
</template>
