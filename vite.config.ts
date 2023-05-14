import { defineConfig } from "vite"
import hybridly from "hybridly/vite"

export default defineConfig({
  plugins: [
    hybridly({
      laravel: {
        valetTls: true,
      },
      autoImports: {
        eslintrc: {
          enabled: true,
        },
        dirs: ["resources/utils"],
      },
    }),
  ],
})
