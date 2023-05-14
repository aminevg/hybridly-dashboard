import { initializeHybridly } from "virtual:hybridly/config"
import { createHead } from "@vueuse/head"
import "./tailwind.css"
import { i18n } from "./i18n"

initializeHybridly({
  enhanceVue: (vue) => {
    vue
      .use(
        createHead({
          titleTemplate: (title) =>
            title ? `${title} — Your Application` : "Your Application",
        })
      )
      .use(i18n)
  },
})
