
module.exports = {
	entry: {
		main: "./src/app.js",
	},
	output: {
		filename: 'sagani.js',
		path: __dirname + "/js"
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				use: { 
					loader : 'babel-loader',
					'options': {
						presets: ['@babel/preset-env']
					}
				},
				exclude: /node_modules/
			}
		]
	},
	mode: 'development',
	watch: true
}