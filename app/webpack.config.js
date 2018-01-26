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

    .addPlugin(new LodashModuleReplacementPlugin)
    .addPlugin(new webpack.optimize.UglifyJsPlugin)
;

// export the final configuration
var config = Encore.getWebpackConfig();

// adding some native webpack config options
config.watchOptions = {
    poll: true,
    ignored: /node_modules/
};

module.exports = config;