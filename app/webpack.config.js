// config/webpack/webpack.config.js
var LodashModuleReplacementPlugin = require('lodash-webpack-plugin');
var webpack = require('webpack');
var Encore = require('@symfony/webpack-encore');

Encore
    // See https://symfony.com/doc/current/frontend/encore/simple-example.html
    .setOutputPath('./public/build')
    .setPublicPath('/build')
    .addEntry('app', './assets/js/app.js')
    .addStyleEntry('main', './assets/sass/main.scss')
    .enableSassLoader()
    .autoProvidejQuery()
    .enableSourceMaps(!Encore.isProduction())
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()

    // VueJS
    .enableVueLoader()
;

module.exports = {
    'module': {
        'rules': [{
            'use': 'babel',
            'test': /\.js$/,
            'exclude': /node_modules/,
            'options': {
                'plugins': ['lodash'],
                'presets': [['env', { 'modules': false, 'targets': { 'node': 4 } }]]
            }
        }]
    },
    'plugins': [
        new LodashModuleReplacementPlugin,
        new webpack.optimize.UglifyJsPlugin
    ]
};

// export the final configuration
module.exports = Encore.getWebpackConfig();