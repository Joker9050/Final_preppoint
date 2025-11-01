import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";

// ✅ Correct Vercel config for React + Vite
export default defineConfig({
  plugins: [react()],
  base: "./",
  build: {
    outDir: "dist",
  },
  server: {
    host: true,
    port: 5173,
  },
});
