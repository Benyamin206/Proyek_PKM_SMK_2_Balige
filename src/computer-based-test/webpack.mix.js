const mix = require('laravel-mix');

// Menyusun CSS
mix.css('resources/css/app.css', 'public/css')
   .js('resources/js/app.js', 'public/js')
   .version(); // Menambahkan versioning untuk cache-busting
