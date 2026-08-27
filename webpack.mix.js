const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
       require('autoprefixer'),
   ])
  
   .extract(['alpinejs', 'axios', 'lodash']); 

// 3. Add versioning for cache-busting in production
if (mix.inProduction()) {
    mix.version();
}