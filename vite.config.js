import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@import "@/resources/scss/app.scss";`, // If you need global SCSS variables or mixins
            },
        },
    },
    build: {
        outDir: 'public/build',
        manifest: true,
        rollupOptions: {
            output: {
                // General pattern for asset file names
                assetFileNames: 'assets/[name].[hash].[ext]',
            },
        },
      },
});
