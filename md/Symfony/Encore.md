2 -Aug-2023
------------

- Installing **Encore** => `composer require symfony/webpack-encore-bundle`
- With Encore, think of your app.js file like a standalone JavaScript application: it will require all of the dependencies it needs (e.g. jQuery or React), including any CSS.
- Encore's job (via Webpack) is simple: to read and follow all of the import statements and create one final app.js (and app.css) that contains everything your app needs. Encore can do a lot more: minify files, pre-process Sass/LESS, support React, Vue.js, etc.
- Configuring Encore/Webpack ?
- To build the assets, run the following: `npm run watch`
- The key part is `addEntry()`?
-


