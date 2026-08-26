import tailwindcss from "@tailwindcss/vite";
import laravel from 'laravel-vite-plugin';
import path from 'path';
import {
    defineConfig
} from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        cors: true,
        watch: {
            ignored: [
                '**/.agents/**',
                '**/.claude/**',
                '**/.cursor/**',
                '**/.junie/**',
                '**/storage/framework/views/**',
                '**/vendor/**',
            ],
        },
    },
    resolve: {
        alias: {
            '@': path.resolve(import.meta.dirname, './resources/js'),
            '@js': path.resolve(import.meta.dirname, './resources/js'),
            '@css': path.resolve(import.meta.dirname, './resources/css'),
            '@vendor': path.resolve(import.meta.dirname, './vendor'),
        },
    },
});
