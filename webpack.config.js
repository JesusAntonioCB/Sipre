const path = require("path");
const webpack = require('webpack');
//window.$ = window.jQuery = require('jquery');

module.exports = {
  mode: 'none',
  watch: true,
  entry: path.join(__dirname, 'src/UtExam/ProEvalBundle/Resources/public/js/main.js'),
  module: {
    rules: [
      {
        test: /vendor\/.+\.(jsx|js)$/,
        use: ['imports?jQuery=jquery,$=jquery,this=>window', 'babel-preset-es2015']
      },
    ]
  },
  output: {
    path: path.join(__dirname, 'src/UtExam/ProEvalBundle/Resources/public/js'),
    filename: 'output.js',
  },
  resolve: {
    alias: {
        jquery: "jquery/src/jquery"
    }
  },
  plugins: [
    new webpack.DefinePlugin({
      'process.env': {
        'NODE_ENV': JSON.stringify('production')
      }
    })
  ],
  node: {
    fs: "empty"
  }
}
