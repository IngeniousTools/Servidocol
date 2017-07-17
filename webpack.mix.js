const { mix } = require('laravel-mix');

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

 mix.js('resources/assets/js/app.js', 'public/js')
  	.js('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.js')
    .js(['node_modules/datatables.net/js/jquery.dataTables.js',
         'node_modules/datatables.net-autofill/js/dataTables.autoFill.js',
         'node_modules/datatables.net-colreorder/js/dataTables.colReorder.js',
         'node_modules/datatables.net-responsive/js/dataTables.responsive.js',
         'node_modules/datatables.net-scroller/js/dataTables.scroller.js',
         'node_modules/datatables.net-select/js/dataTables.select.js'
        ], 'public/js/datatables.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles(['resources/assets/plugins/font-awesome/css/font-awesome.min.css'], 'public/css/font-awesome.css')
    .styles(['node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
             'node_modules/datatables.net-autofill-bs/css/autoFill.bootstrap.css',
             'node_modules/datatables.net-colreorder-bs/css/colReorder.bootstrap.css',
             'node_modules/datatables.net-responsive-bs/css/responsive.bootstrap.css',
             'node_modules/datatables.net-scroller-bs/css/scroller.bootstrap.css',
             'node_modules/datatables.net-select-bs/css/select.bootstrap.css'
            ],'public/css/datatables.css');
