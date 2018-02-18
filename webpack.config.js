const path = require('path');
const webpack = require('webpack');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

module.exports = {
	entry: './js/index.js',
	output: {
		filename: 'bundle.js',
		path: path.resolve(__dirname, 'dist')
	},
	plugins:[
		new UglifyJsPlugin()
		/*new webpack.DefinePlugin({
			'process.env.NODE_ENV': JSON.stringify('production')
		})*/
	],
	resolve: {
		extensions: ['.js', '.jsx'],
		mainFields: ['browser', 'main']
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /(node_modules|bower_components|dist)/,
				use: {
					loader: 'babel-loader'
				}
			},
			{
				test: /\.js$/,
				exclude: /(node_modules|bower_components|dist)/,
				use: [ "babel-loader", 'eslint-loader']
			}
		]
	}
};