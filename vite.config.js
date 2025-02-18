import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.jsx',
                'resources/css/app.css',
                'resources/sass/app.scss'
            ],
            refresh: true,
        }),
    ],
});
