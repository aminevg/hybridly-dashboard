<script setup lang="ts">
const flash = useProperty("flash")

type Notification = {
  id: number
  type: "success" | "error"
  content: string
}

const notifications = ref<Notification[]>([])
const notificationsMaxId = computed(() =>
  Math.max(...notifications.value.map((notification) => notification.id), 0)
)

registerHook("navigated", () => {
  if (!flash.value) return
  Object.entries(flash.value).forEach(([key, value]) => {
    if (value) {
      const newId = notificationsMaxId.value + 1
      notifications.value.unshift({
        id: notificationsMaxId.value + 1,
        type: key as "success" | "error",
        content: value,
      })
      setTimeout(() => closeNotification(newId), 10000)
    }
  })
})

function closeNotification(notificationIdToClose: number) {
  notifications.value = notifications.value.filter(
    (notification) => notification.id !== notificationIdToClose
  )
}
</script>

<template>
  <TransitionGroup
    name="list"
    tag="ul"
    class="toast-center toast toast-top z-50 md:toast-end md:toast-bottom"
  >
    <li
      v-for="notification in notifications"
      :key="notification.id"
      class="alert w-max max-w-xs cursor-pointer shadow-xl lg:max-w-sm"
      :class="{
        'alert-success': notification.type === 'success',
        'alert-error': notification.type === 'error',
      }"
      @click="closeNotification(notification.id)"
    >
      {{ notification.content }}
    </li>
  </TransitionGroup>
</template>

<style scoped>
.list-move, /* apply transition to moving elements */
.list-enter-active,
.list-leave-active {
  transition: all 0.25s ease;
}

.list-enter-from,
.list-leave-to {
  opacity: 0;
}
</style>
