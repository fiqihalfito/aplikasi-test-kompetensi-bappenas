let mix = require('laravel-mix');

mix.js('src/app.js', 'public/js').postCss('src/app.css', 'public/css', [
    require("tailwindcss"),
]).browserSync({
    proxy: 'http://localhost:8080',
    notify: false
});