const path = require('path');
const webpack = require('webpack');

module.exports = {
	entry: './js/app.js',
	output: {
		filename: 'bundle.js',
		path: path.resolve(__dirname, 'dist')
	},
	plugins:[
	new webpack.DefinePlugin({
		'process.env.NODE_ENV': JSON.stringify('production')
	})
	],
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /(node_modules|bower_components)/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['babel-preset-env']
					}
				}
			}
		]
	}
};