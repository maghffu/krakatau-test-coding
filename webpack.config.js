const path = require('path');

module.exports = {
  entry: './src/Views/resources/js/index.js',
  module: {
    rules: [
      {
        test: /\.s[ac]ss$/i,
        use: [
          // Creates `style` nodes from JS strings
          'style-loader',
          // Translates CSS into CommonJS
          'css-loader',
          // Compiles Sass to CSS
          'sass-loader',
        ],
      },
    ],
  },
  output: {
    filename: 'app.js',
    path: path.resolve(__dirname, 'public'),
  },
};