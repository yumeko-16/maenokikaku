module.exports = {
  mode: "development",
  cache: {
    type: "filesystem",
    buildDependencies: {
      config: [__filename],
    },
  },
  entry: {
    home: __dirname + "/src/js/home.js",
    expert: __dirname + "/src/js/expert.js",
    contact: __dirname + "/src/js/contact.js",
  },
  output: {
    path: __dirname + "/dist/js", //ビルドしたファイルを吐き出す場所
    filename: "[name].js", //ビルドした後のファイル名
  },
  devServer: {
    static: {
      directory: "./dist",
    },
    open: true,
  },
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
    ],
  },
  resolve: {
    modules: [`${__dirname}/src`, "node_modules"],
    extensions: [".js"],
  },
};
