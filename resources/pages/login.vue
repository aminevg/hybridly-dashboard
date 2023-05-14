<script setup lang="ts">
const form = useForm({
  url: route("login.store"),
  method: "POST",
  fields: {
    email: "",
    password: "",
    remember: false,
  } satisfies App.Data.LoginData,
  hooks: {
    after: () => {
      form.reset("password")
    },
  },
})

useHead({ title: "Login" })
</script>

<template>
  <div class="hero min-h-screen bg-base-300">
    <div class="hero-content flex-col">
      <div class="py-6 text-center">
        <h1 class="text-4xl font-bold sm:text-5xl">Your Application</h1>
      </div>
      <div class="card w-full max-w-sm flex-shrink-0 bg-base-100 shadow-2xl">
        <form class="card-body" @submit.prevent="form.submit">
          <div class="form-control">
            <label class="label" for="email">
              <span class="label-text text-base">Email Address</span>
            </label>
            <input
              v-model="form.fields.email"
              type="email"
              required
              autofocus
              autocomplete="username"
              placeholder="メールアドレス"
              class="input-primary input"
            />
            <div v-if="form.errors.email" class="mt-2 text-error">
              {{ form.errors.email }}
            </div>
          </div>
          <div class="form-control">
            <label class="label" for="password">
              <span class="label-text text-base">Password</span>
            </label>
            <input
              v-model="form.fields.password"
              type="password"
              required
              autocomplete="current-password"
              placeholder="パスワード"
              class="input-primary input"
            />
            <div v-if="form.errors.password" class="mt-2 text-error">
              {{ form.errors.password }}
            </div>
          </div>
          <div class="form-control mt-3">
            <label class="label flex cursor-pointer justify-center gap-x-2">
              <input
                v-model="form.fields.remember"
                type="checkbox"
                class="checkbox-primary checkbox"
              />
              <span class="label-text text-base">Remember me</span>
            </label>
          </div>
          <div class="form-control mt-6">
            <button
              :disabled="form.processing"
              class="btn-primary btn text-base"
            >
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
