import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/addField.js',
                'resources/js/commentConfirmation.js',
                'resources/js/commentPagination.js',
                'resources/js/deleteConfirmation.js',
                'resources/js/like1.js',
                'resources/js/like2.js',
                'resources/js/inquiryConfirmation.js',
                'resources/js/postConfirmation.js',
                'resources/js/search.js',
            ],
            refresh: true,
        }),
    ],
});
