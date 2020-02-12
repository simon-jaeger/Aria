const mix = require("laravel-mix")

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application.
 |
 */

mix.disableSuccessNotifications();

mix
  .styles(["resources/css/reset.css", "resources/css/base.css", "resources/css/components.css"], "public/css/global.css")
  .styles(["resources/css/public.css"], "public/css/public.css")
  .js("resources/spa/main.js", "public/js/spa.js")
  .sourceMaps()
