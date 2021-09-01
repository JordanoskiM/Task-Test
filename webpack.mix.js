const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.copyDirectory('resources/vendors/simple-line-icons/fonts', 'public/fonts');
mix.copyDirectory('resources/images', 'public/images');

mix.sass('resources/scss/app.scss', 'public/css/app.css');
mix.styles([
    'resources/vendors/@coreui/icons/css/coreui-icons.min.css',
    'resources/vendors/flag-icon-css/css/flag-icon.min.css',
    'resources/vendors/font-awesome/css/font-awesome.min.css',
    'resources/vendors/simple-line-icons/css/simple-line-icons.css',
    'resources/vendors/pace-progress/css/pace.min.css',
    'resources/css/style.css',
    'public/css/app.css',
], 'public/css/app.min.css')

mix.scripts([
    'resources/vendors/jquery/js/jquery.min.js',
    'resources/vendors/popper.js/js/popper.min.js',
    'resources/vendors/bootstrap/js/bootstrap.min.js',
    'resources/vendors/pace-progress/js/pace.min.js',
    'resources/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js',
    'resources/vendors/@coreui/coreui/js/coreui.min.js',
    'resources/vendors/pnotify/js/Pnotify.js',
    'resources/vendors/pnotify/js/PnotifyButtons.js',
    'resources/vendors/pnotify/js/PnotifyConfirm.js',
    'resources/vendors/pnotify/js/PnotifyMobile.js',
    'resources/vendors/pnotify/js/PnotifyNonBlock.js',
    'resources/vendors/chart.js/js/Chart.min.js',
    'resources/vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js',
//    'resources/js/main.js',
    'resources/js/app.js',
], 'public/js/app.js')
//mix.js('resources/js/app.js', 'public/js')
