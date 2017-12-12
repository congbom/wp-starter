var webpack = require('webpack');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
    entry: './webpack.entry.js',
    output: {
        filename: 'bundle.js',
        path: __dirname + '/distribute'
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                	fallback: 'style-loader', 			// inject CSS to page
                	use: [
                		{
	                        loader: 'css-loader',       // translates CSS into CommonJS modules
	                    }, {
	                        loader: 'postcss-loader',   // Run post css actions
	                        options: {
	                            plugins: function() {   // post css plugins, can be exported to postcss.config.js
	                                return [
	                                    require('precss'),
	                                    require('autoprefixer')
	                                ];
	                            }
	                        }
	                    }, {
	                        loader: 'sass-loader',
	                    }
	                ]
                })					 
            }, {
                test: /.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'fonts/', // where the fonts will go
                            publicPath: '' // override the default path
                        }
                    }
                ]
            }, {
                test: /\.(gif|jpg|png)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'images/', // where the images will go
                            publicPath: '' // override the default path
                        }
                    }
                ]
            }
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            Popper: ['popper.js', 'default'],
        }),
        new ExtractTextPlugin("styles.css")
    ],
    watch: true
}