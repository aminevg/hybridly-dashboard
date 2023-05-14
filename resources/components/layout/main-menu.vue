<script setup lang="ts">
import IIcBaselineDashboard from "~icons/ic/baseline-dashboard"

const currentRoute = useProperty("currentRoute")
</script>

<template>
  <ul
    class="menu justify-evenly text-2xl sm:justify-normal sm:gap-y-8 sm:text-3xl lg:flex-nowrap lg:text-xl"
  >
    <layout-menu-item
      :icon-component="IIcBaselineDashboard"
      title="ホーム"
      :href="route('home')"
      :active="currentRoute === 'home'"
    />
  </ul>
</template>
