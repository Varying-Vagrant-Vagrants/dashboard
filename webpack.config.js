const path = require('path');
const webpack = require('webpack');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

module.exports = {
	entry: {
		'bundle': './js/index.js',
		"bundle.min": "./js/index.js"
	},
	output: {
		filename: '[name].js',
		path: path.resolve(__dirname, 'dist')
	},
	plugins:[
		new UglifyJsPlugin({
			include: /\.min\.js$/
		}),
		new webpack.DefinePlugin({
			'process.env.NODE_ENV': JSON.stringify(/*process.env.NODE_ENV ||*/ 'development')
		}),
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