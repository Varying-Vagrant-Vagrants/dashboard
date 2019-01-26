const path = require('path');
const webpack = require('webpack');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

module.exports = {
  entry: {
    'bundle': ["babel-polyfill", './js/index.jsx'],
    'bundle.min': ["babel-polyfill", './js/index.jsx'],
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'dist'),
  },
  plugins: [
    new UglifyJsPlugin({
      include: /\.min\.js$/,
    }),
    /* new webpack.DefinePlugin({
            'process.env.NODE_ENV': JSON.stringify('production')
        }) */
  ],
  mode: "development",
  resolve: {
    extensions: ['.js', '.jsx'],
    mainFields: ['browser', 'main'],
  },
  module: {
    rules: [
      {
        test: /\.js?x$/,
        include: path.resolve(__dirname, 'js'),
        use: {
          loader: 'babel-loader',
        },
      },
      {
        test: /\.js$/,
        include: path.resolve(__dirname, 'js'),
        use: ['babel-loader', 'eslint-loader'],
      },
    ],
  },
};

