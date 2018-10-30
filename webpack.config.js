const HtmlWebPackPlugin = require("html-webpack-plugin");

module.exports = {
	devServer: {
		historyApiFallback: true,
		watchOptions: {
			poll: true
		}
	},
	resolve: {
		extensions: ["*", ".js", ".jsx"]
	},
	module: {
		rules: [
			{
				test: /\.(js|jsx)$/,
				exclude: /node_modules/,
				use: {
					loader: "babel-loader"
				}
			},
			{
				test: /\.(scss|css)$/,
				use: [
					{
						loader: "css-loader",
						options: {
							minimize: {
								safe: true
							},
							importLoaders: 1,
						}
					},
					{
						loader: "sass-loader",
						options: {}
					}
				]
			},
			{
				test: /\.html$/,
				use: [
					{
						loader: "html-loader",
						options: { minimize: true }
					}
				]
			}
		]
	},
	output: {
		path: __dirname + '/dist',
		publicPath: '/'
	},
	plugins: [
		new HtmlWebPackPlugin({
			template: "./src/index.html",
			filename: "./index.html"
		})
	]
};