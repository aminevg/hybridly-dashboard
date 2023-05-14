<script setup lang="ts">
const drawerOpen = ref(false)

registerHook("start", () => (drawerOpen.value = false))
</script>

<template>
  <div class="drawer-mobile drawer">
    <input
      id="layout-drawer"
      v-model="drawerOpen"
      type="checkbox"
      class="drawer-toggle"
    />
    <div class="drawer-content">
      <div class="flex h-screen flex-col">
        <div class="flex flex-shrink-0">
          <div
            class="flex items-center justify-center bg-base-300 lg:min-w-[14rem]"
          >
            <label
              for="layout-drawer"
              class="btn-ghost drawer-button btn-square btn lg:hidden"
            >
              <i-ic-baseline-menu width="24" height="24" />
            </label>
            <div class="w-max select-none text-xl font-bold">
              Your Application
            </div>
          </div>
          <layout-navigation-bar />
        </div>
        <div class="flex flex-grow overflow-hidden">
          <layout-desktop-menu />
          <div
            class="flex-grow overflow-y-scroll bg-base-100 p-8"
            scroll-region
          >
            <slot />
          </div>

          <layout-notifications />
        </div>
      </div>
    </div>

    <div class="drawer-side">
      <label for="layout-drawer" class="drawer-overlay"></label>
      <layout-mobile-menu />
    </div>
  </div>
</template>
