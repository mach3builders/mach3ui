import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
    build: {
        outDir: 'resources/dist/js',
        emptyDirBefore: true,
        rollupOptions: {
            input: {
                'code-editor': resolve(__dirname, 'resources/js/code-editor.js'),
            },
            output: {
                entryFileNames: '[name].js',
                format: 'es',
            },
        },
    },
});
