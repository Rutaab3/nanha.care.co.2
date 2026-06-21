import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                'resources/views/**',
                'routes/**',
                'app/**',
            ],
        }),
        tailwindcss(),
    ],
    server: {
        hmr: {
            host: 'localhost',
        },
        watch: {
            ignored: [
                '**/storage/framework/views/**',
                '**/storage/logs/**',
                '**/vendor/**',
                '**/node_modules/**',
                '**/.git/**',
                '**/bootstrap/cache/**',
            ],
        },
    },
});
