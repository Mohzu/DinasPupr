import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/news-slider.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        // Enable minification
        minify: 'esbuild',
        // Optimize chunk splitting
        rollupOptions: {
            output: {
                manualChunks: (id) => {
                    if (id.includes('node_modules')) {
                        return 'vendor';
                    }
                },
            },
        },
        // Enable CSS code splitting
        cssCodeSplit: true,
        // Optimize asset file names
        assetsInlineLimit: 4096,
    },
    // Enable compression
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});