const mix = require("laravel-mix")

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .styles(["resources/css/reset.css", "resources/css/base.css", "resources/css/components.css"], "public/css/global.css")
  .js("resources/js/global.js", "public/js")
  .js("resources/spa/main.js", "public/js/spa.js")
