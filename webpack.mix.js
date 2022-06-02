const mix = require('laravel-mix');
const MonacoWebpackPlugin = require('monaco-editor-webpack-plugin')
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

/*mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])*/
mix.copy("node_modules/xterm/lib/xterm.js", 'public/javascript/vendors/xterm.js');
mix.copy("node_modules/xterm/css/xterm.css", 'public/css/vendors/xterm.css');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css')
    .webpackConfig({
        plugins: [
            new MonacoWebpackPlugin({
                languages: ['css', 'html', 'javascript', 'json', 'scss', 'typescript'],
            }),
        ],
    })
    .copyDirectory('node_modules/monaco-editor', 'public/vendors/monaco');

