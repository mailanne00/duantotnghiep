import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/createChat.js",
                "resources/js/app.js",
                "resources/js/public.js",
                "resources/js/present.js",
            ],
            refresh: true,
        }),
    ],
});
