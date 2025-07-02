import {defineConfig} from 'vite'
import checker from "vite-plugin-checker";
import path from "path";
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

export default defineConfig({
    root: ".",
    base: "",
    plugins: [
        checker({
            typescript: true,
        }),
    ],
    build: {
        outDir: path.resolve(
            __dirname,
            `../views/js`,
        ),
        emptyOutDir: true,
        rollupOptions: {
            input: {
                "widget-integration": path.resolve(
                    __dirname,
                    "./src/widgetIntegration.ts",
                ),
            },
            output: {
                entryFileNames: `[name].min.js`,
                assetFileNames: `[name].min[extname]`,
            }
        }
    }
})