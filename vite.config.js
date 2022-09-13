import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import inject from '@rollup/plugin-inject';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.css.js',
                'resources/js/app.init.js',
                'resources/js/app.js',
            ],
            refresh: true,
        }),

        inject({
            include: '**/*.js',
            exclude: 'node_modules/**',
            $: 'jquery',
            jQuery: 'jquery',
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            vue: 'vue/dist/vue.esm-bundler',
            'popper.js': '@poperjs/core/dist/esm/popper',
        },
    },
});