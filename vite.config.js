import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/addField.js',
                'resources/js/like.js',
                'resources/js/postConfirmation.js',
            ],
            refresh: true,
        }),
    ],
});
