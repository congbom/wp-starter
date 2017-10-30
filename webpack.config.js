var webpack = require('webpack');

module.exports = {
	entry: './webpack.entry.js',
	output: {
		filename: 'bundle.js',
		path: __dirname + '/assets/dist'
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