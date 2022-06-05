const mix = require('laravel-mix');
const MonacoWebpackPlugin = require('monaco-editor-webpack-plugin');
const webpack = require('webpack');
require('mix-tailwindcss'); /* Add this line at the top */


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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .options({
    }).tailwind('./tailwindcss.config.js')
    .webpackConfig({
        plugins: [
            new MonacoWebpackPlugin({
                languages: ['css', 'html', 'javascript', 'json', 'scss', 'typescript'],
            }),
            new webpack.ProvidePlugin({
                '$': 'jquery',
                'jQuery': 'jquery',
                'window.jQuery': 'jquery',
            }),
        ],
    });
mix.js([
    'node_modules/xterm/lib/xterm.js'], 'public/js/app.js'
);
mix.css('node_modules/xterm/css/xterm.css', 'public/css/app.css');
mix.copy('node_modules/bootstrap-icons/font/fonts/bootstrap-icons.woff2', 'public/css/fonts')
mix.copy('node_modules/bootstrap-icons/font/fonts/bootstrap-icons.woff', 'public/css/fonts')

