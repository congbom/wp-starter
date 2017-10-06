var webpack = require('webpack');

module.exports = {
	entry: './app.js',
	output: {
		filename: 'bundle.js',
		path: __dirname + '/../assets/dist'
	},
	module: {
		loaders: [
			{ 
				test: /\.(scss)$/, 
				loaders: 'style-loader!css-loader!sass-loader' 
			}
		]
	},
	plugins: [
		new webpack.ProvidePlugin({
	        $: 'jquery',
	        jQuery: 'jquery',
	        'window.jQuery': 'jquery',
	        Popper: ['popper.js', 'default'],
	    })
	]
}