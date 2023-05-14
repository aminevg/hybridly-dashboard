<script setup lang="ts">
const isDark = useDark({
  selector: "html",
  attribute: "data-theme",
  valueDark: "dark",
  valueLight: "light",
})
</script>

<template>
  <div class="navbar bg-base-300">
    <div class="navbar-end flex-1">
      <ul class="menu menu-horizontal">
        <li>
          <a @click="isDark = !isDark">
            <i-ic-baseline-dark-mode v-if="isDark" width="24" height="24" />
            <i-ic-baseline-light-mode v-else width="24" height="24" />
          </a>
        </li>
        <li>
          <a>
            <router-link as="button" :href="route('logout')" method="POST">
              Logout
            </router-link>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>
