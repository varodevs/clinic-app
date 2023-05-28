import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
                host: 'ec2-18-213-223-134.compute-1.amazonaws.com',
            },
    plugins: [
        laravel({
            input: ['/var/www/html/resources/sass/app.scss',
                '/var/www/html/resources/css/app.css',
                '/var/www/html/resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
