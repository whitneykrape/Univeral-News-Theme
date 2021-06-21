// const merge = require("webpack-merge");
const path = require("path");
// const { CleanWebpackPlugin } = require('clean-webpack-plugin');

const common = require("./webpack.common");

/*
module.exports = merge(common, {
  mode: "development",

  output: {
  },

  devServer: {
    port: process.env.PORT || 3000,
    contentBase: path.join(process.cwd(), "./dist"),
    watchContentBase: true,
    quiet: false,
    open: true,
    historyApiFallback: {
      rewrites: [{from: /./, to: "404.html"}]
    }
  },

  plugins: [
  ]
});
*/
module.exports = {
  //...
  devServer: {
    contentBase: path.join(__dirname, 'dist'),
    compress: true,
    port: 9000,
  },
};