// config/webpack/webpack.config.js

var Encore = require('@symfony/webpack-encore');
Encore
    // See https://symfony.com/doc/current/frontend/encore/simple-example.html
    .setOutputPath('./public/build')
    .setPublicPath('/build')
    .addEntry('app', './assets/js/app.js')
    .enableSassLoader()
    .autoProvidejQuery()
    .enableSourceMaps(!Encore.isProduction())
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()

    // VueJS
    .enableVueLoader()
;

// export the final configuration
module.exports = Encore.getWebpackConfig();