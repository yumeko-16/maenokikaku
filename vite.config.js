import { defineConfig } from 'vite';

export default defineConfig({
  root: 'src',
  build: {
    outDir: '../dist',
    emptyOutDir: true,
    cssCodeSplit: true,
    rollupOptions: {
      input: {
        index: 'src/index.html',
        expert: 'src/expert/index.html',
        'scripts/common': 'src/assets/scripts/common.ts',
        'scripts/pages/index': 'src/assets/scripts/pages/index.ts',
        'scripts/pages/expert/index':
          'src/assets/scripts/pages/expert/index.ts',
        'scripts/pages/contact/index':
          'src/assets/scripts/pages/contact/index.ts',
        'styles/ress': 'src/assets/styles/ress.scss',
        'styles/pages/index': 'src/assets/styles/pages/index.scss',
        'styles/pages/expert/index':
          'src/assets/styles/pages/expert/index.scss',
        'styles/pages/contact/index':
          'src/assets/styles/pages/contact/index.scss',
      },
      output: {
        entryFileNames: 'assets/[name].js',
        chunkFileNames: 'assets/[name].js',
        assetFileNames: 'assets/[name].[ext]',
      },
    },
  },
});
