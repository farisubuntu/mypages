---
title:  Deploy React Vite PWA to GitHub Pages

---

[[toc]]

GitHub repo: [https://github.com/iamfranco/example-react-vite-pwa](https://github.com/iamfranco/example-react-vite-pwa)

Demo: [https://francochan.co/example-react-vite-pwa/](https://francochan.co/example-react-vite-pwa/)

[![Image description](https://res.cloudinary.com/practicaldev/image/fetch/s--CXMi6hdO--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_800/https://dev-to-uploads.s3.amazonaws.com/uploads/articles/tt20ea2wyhcdu7s8nty8.png)](https://res.cloudinary.com/practicaldev/image/fetch/s--CXMi6hdO--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_800/https://dev-to-uploads.s3.amazonaws.com/uploads/articles/tt20ea2wyhcdu7s8nty8.png)

___

### [](https://dev.to/iamfranco/deploy-react-vite-pwa-to-github-pages-35i#step-0-initialise-vite-react-app)

## Step 0: Initialise vite React app

Create a new GitHub repo, clone it locally, and initialise a new vite React app, with command:

```
npm init vite .
```

or similar.

### [](https://dev.to/iamfranco/deploy-react-vite-pwa-to-github-pages-35i#step-1-deploy-to-github-pages)

## Step 1: Deploy to GitHub Pages

Install the `gh-pages` npm package:

```
npm i gh-pages --save-dev
```

Open `vite.config.ts` and add in this line:


```js
import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  base: 'example-react-vite-pwa', // <--- 👀
  plugins: [react()],
})
```

where `example-react-vite-pwa` is the repo's name.

Open `package.json` and add in the following lines:

```json
{
  "name": "example-react-vite-pwa",
  "homepage": "https://iamfranco.github.io/example-react-vite-pwa/", // <--- 👀
  "private": true,
  "version": "0.0.0",
  "type": "module",
  "scripts": {
    "dev": "vite",
    "build": "tsc && vite build",
    "lint": "eslint . --ext ts,tsx --report-unused-disable-directives --max-warnings 0",
    "preview": "vite preview",
    "predeploy": "npm run build", // <--- 👀
    "deploy": "gh-pages -d dist" // <--- 👀
  },
  ...
}
```


where the `https://iamfranco.github.io/example-react-vite-pwa/` is in the format of `https://<username>.github.io/<repo-name>/`.

But if your GitHub pages is on a custom domain, for example: `https://francochan.co`, then that becomes `https://francochan.co/example-react-vite-pwa/`

So now you can run `npm run deploy` to deploy the site to GitHub Pages. For example:

[![Image description](https://res.cloudinary.com/practicaldev/image/fetch/s--xHJG2jgY--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_800/https://dev-to-uploads.s3.amazonaws.com/uploads/articles/7ugjjsivw1j0tjc85216.png)](https://res.cloudinary.com/practicaldev/image/fetch/s--xHJG2jgY--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_800/https://dev-to-uploads.s3.amazonaws.com/uploads/articles/7ugjjsivw1j0tjc85216.png)

### [](https://dev.to/iamfranco/deploy-react-vite-pwa-to-github-pages-35i#step-2-configure-pwa)


### Step 2: Configure PWA

Install `vite-plugin-pwa` npm package:

```
npm i vite-plugin-pwa
```

Install `@vite-pwa/assets-generator` as dev-dependency:

```
npm i @vite-pwa/assets-generator --save-dev
```

Open `package.json` and add in the line:

```json
{
  "name": "example-react-vite-pwa",
  "homepage": "https://francochan.co/example-react-vite-pwa/",
  "private": true,
  "version": "0.0.0",
  "type": "module",
  "scripts": {
    "dev": "vite",
    "build": "tsc && vite build",
    "lint": "eslint . --ext ts,tsx --report-unused-disable-directives --max-warnings 0",
    "preview": "vite preview",
    "predeploy": "npm run build",
    "deploy": "gh-pages -d dist",
    "generate-pwa-assets": "pwa-assets-generator" // <--- 👀
  },
  ...
}
```

Open `vite.config.ts` and replace its content with:

```ts
import { defineConfig } from 'vite'
import { VitePWA } from 'vite-plugin-pwa'

// https://vitejs.dev/config/
export default defineConfig({
  base: 'example-react-vite-pwa', // <--- 👀
  plugins: [
    VitePWA({
      registerType: 'autoUpdate',
      includeAssets: ['favicon.ico', 'apple-touch-icon.png', 'mask-icon.svg'],
      manifest: {
        name: 'Example React Vite PWA', // <--- 👀
        short_name: 'React Vite PWA', // <--- 👀
        description: 'Description', // <--- 👀
        theme_color: '#ffffff',
        icons: [
          {
            src: 'pwa-192x192.png',
            sizes: '192x192',
            type: 'image/png'
          },
          {
            src: 'pwa-512x512.png',
            sizes: '512x512',
            type: 'image/png'
          }
        ]
      }
    })
  ],
})
```


Create a new file `pwa-assets.config.ts` at the base folder (next to `package.json`), with the content:

```ts
import { defineConfig, minimalPreset as preset } from '@vite-pwa/assets-generator/config'

export default defineConfig({
  preset,
  images: [
    'public/vite.svg'
  ]
})
```

so this configures the `generate-pwa-assets` command to generate new pwa asset logos based on `public/vite.svg`.

So now run the command:

```sh
npm run generate-pwa-assets
```

and you should see some new assets in the `/public/` folder:

[![Image description](https://res.cloudinary.com/practicaldev/image/fetch/s--pDA22ziA--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_800/https://dev-to-uploads.s3.amazonaws.com/uploads/articles/3sr1z8pqjx451vdhtfu7.png)](https://res.cloudinary.com/practicaldev/image/fetch/s--pDA22ziA--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_800/https://dev-to-uploads.s3.amazonaws.com/uploads/articles/3sr1z8pqjx451vdhtfu7.png)

Lastly open the `index.html` and add the following lines:

```html
<meta name="description" content="description">
<link rel="icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="/apple-touch-icon.png" sizes="180x180">
<link rel="mask-icon" href="/mask-icon.svg" color="#FFFFFF">
<meta name="theme-color" content="#ffffff">
```

in the `<head> ... </head>`.

If you run locally:

```bash
npm run build
npm run preview
```

or deploy to GitHub Pages:

```bash
npm run deploy
```

then you should be able to see the install app icon:

[![Image description](https://res.cloudinary.com/practicaldev/image/fetch/s--hIdimSo2--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_800/https://dev-to-uploads.s3.amazonaws.com/uploads/articles/gro9eqmr1op318htnlk8.png)](https://res.cloudinary.com/practicaldev/image/fetch/s--hIdimSo2--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_800/https://dev-to-uploads.s3.amazonaws.com/uploads/articles/gro9eqmr1op318htnlk8.png)

[https://francochan.co/example-react-vite-pwa/](https://francochan.co/example-react-vite-pwa/)

<style>
img{
 width:300px;
 height:200px;
}
 </style>