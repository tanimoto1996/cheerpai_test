import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            ssr: ['resources/js/ssr.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        host: true,
        hmr: {
            host: '192.168.100.230',
        },
        watch: {
            usePolling: true,
        },
        port: 5175
    },
    ssr: {
        noExternal: ['@inertiajs/server'],
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
            ziggy: path.resolve('vendor/tightenco/ziggy/dist/index.es.js'),
            ziggyVue: path.resolve('vendor/tightenco/ziggy/dist/vue.es.js'),
        },
    },
});
