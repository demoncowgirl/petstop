const path = require('path');
const { VueLoaderPlugin } = require('vue-loader');

module.exports = {
  entry: './src/js/app.js',
  output: {
    path: path.resolve(__dirname, './dist'),
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: 'css-loader'{
          options: sourceMap: true
        },
        test: /\.vue$/,
        loader: 'vue-loader'
      }
    ]
  },
  plugins: [
  new VueLoaderPlugin();
]
}
