import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
    plugins: [],
    build: {
        lib: {
            entry: {
                'code-editor': resolve(__dirname, 'resources/js/code-editor.js'),
            },
            formats: ['es'],
        },
        outDir: 'dist',
        cssCodeSplit: false,
        rollupOptions: {
            output: {
                entryFileNames: '[name].js',
                assetFileNames: '[name].[ext]',
            },
        },
        minify: true,
        sourcemap: false,
    },
});
