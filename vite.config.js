import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  root: './',
  build: {
    outDir: 'dist',
    emptyOutDir: false,
    assetsDir: 'assets/js',
    rollupOptions: {
      input: {
        common: path.resolve(__dirname, 'src/assets/ts/common.ts'),
      },
      output: {
        entryFileNames: 'assets/js/[name].js',
      },
    },
  },
});
