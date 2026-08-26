const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
       require('autoprefixer'),
   ])
   // 1. Extract third-party libraries into a vendor.js file
   .extract(['alpinejs', 'axios', 'lodash']); 

// 2. Add versioning for cache-busting in production
if (mix.inProduction()) {
    mix.version();
}