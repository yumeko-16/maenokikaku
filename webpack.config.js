module.exports = {
  mode: 'development',
  entry: {
    home: __dirname + "/src/home.js",
    expert: __dirname + "/src/expert.js"
  },
  output: {
    path: __dirname +'/dist/js', //ビルドしたファイルを吐き出す場所
    filename: '[name].js' //ビルドした後のファイル名
  },
  devServer: {
    static: {
      directory: './dist',
    },
    open: true
  },
  module: {
    rules: [{
      //loader
    }]
  }
};