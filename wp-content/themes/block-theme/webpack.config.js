const webpack = require('webpack');
const minicss = require('mini-css-extract-plugin');

module.exports = {
    entry: {
        editor: [
            './assets/scss/editor.scss',
        ],
        admin: [
            './assets/scss/admin.scss',
            './assets/js/admin.js',
        ],
        main: [
            './assets/scss/main.scss',
            './assets/js/main.js',
        ]
    },
    output: {
        path: __dirname + '/assets/dist',
    },
    module: {
        rules: [
            {
                test: /\.(scss)$/,
                use: [ minicss.loader, 'css-loader', 'postcss-loader', 'sass-loader' ]
            }, {
                test: /\.(png|svg|jpg|gif|woff|woff2|eot|ttf|otf)$/,
                use: 'file-loader'
            }
        ]
    },
    plugins: [
        new minicss(),
    ],
    watch: true,
    mode: 'production',
    performance: {
        hints: false
    }
}
