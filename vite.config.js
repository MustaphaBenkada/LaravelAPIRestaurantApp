import { resolve } from 'node:path';
import { defineConfig } from 'vite';

const projectRoot = import.meta.dirname;

export default defineConfig({
  publicDir: false,
  css: {
    preprocessorOptions: {
      scss: {
        silenceDeprecations: [
          'import',
          'global-builtin',
          'color-functions',
          'if-function',
          'abs-percent',
        ],
      },
    },
  },
  build: {
    outDir: 'public',
    emptyOutDir: false,
    sourcemap: false,
    cssCodeSplit: true,
    codeSplitting: false,
    rollupOptions: {
      input: resolve(projectRoot, 'resources/js/app.js'),
      output: {
        format: 'es',
        entryFileNames: 'js/app.js',
        chunkFileNames: 'js/[name].js',
        assetFileNames: (assetInfo) => {
          const fileName = (assetInfo.names && assetInfo.names[0]) || assetInfo.name || '';

          if (fileName.endsWith('.css')) {
            return 'css/app.css';
          }

          return 'assets/[name][extname]';
        },
      },
    },
  },
});
