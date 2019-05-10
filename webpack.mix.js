let mix = require('laravel-mix');
let front = require('laravel-mix');
require('laravel-mix-purgecss')
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

front.styles([
   'public/assets/css/bootstrap.min.css',
   'public/assets/css/font-awesome.css',
   'public/assets/css/owl.carousel.min.css',
   'public/assets/css/idangerous.swiper.css',
   'public/assets/css/style.css',
   'public/assets/css/mycss.css',
   'public/assets/css/genius1.css',
   'public/assets/css/genius-slider.css',
   'public/assets/css/genius-gallery.css',
   'public/@styleadmin/node_modules/jquery-toast-plugin/dist/jquery.toast.min.css',
   'public/assets/css/lightbox.css',
   'public/@styleadmin/css/algolia.css',
   'public/assets/css/animate.min.css',   
], 'public/css/app.css');

front.scripts([
   'public/assets/js/jquery.js',
   'public/assets/js/owl.carousel.min.js',
   'public/assets/js/wow.min.js',
   'public/assets/js/jquery.smooth-scroll.js',
   'public/assets/js/jquery-ui.js',
   'public/assets/js/bootstrap.min.js',
   'public/assets/js/genius.js',
   'public/assets/js/genius-slider.js',
   'public/assets/js/idangerous.swiper.min.js',
   'public/assets/js/global.js',
   'public/@styleadmin/node_modules/jquery-toast-plugin/dist/jquery.toast.min.js',
   'public/@styleadmin/js/toastDemo.js',
   'public/assets/js/algoliasearch.min.js',
   'public/assets/js/autocomplete.min.js',
   'public/@styleadmin/js/pusher.min.js',
   'public/@styleadmin/js/myjs.js'
], 'public/js/app.js');



