<script setup lang="ts">
import { SVGAttributes } from "vue"
import { FunctionalComponent } from "vue"

defineProps<{
  iconComponent: FunctionalComponent<SVGAttributes>
  title: string
  href: string
  active: boolean
}>()
</script>

<template>
  <li>
    <router-link :href="href" :class="{ active }">
      <component :is="iconComponent" class="h-12 w-12 sm:h-8 sm:w-8" />
      {{ title }}
    </router-link>
  </li>
</template>
