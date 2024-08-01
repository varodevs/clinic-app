import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
                host: 'ec2-18-213-223-134.compute-1.amazonaws.com',
            },
    plugins: [
        laravel({
            input: ['resources/scss/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
