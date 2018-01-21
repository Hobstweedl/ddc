let mix = require('laravel-mix');

mix.webpackConfig({
  resolve: {
    modules: [
      "node_modules"
    ]
  }
});

mix.js('resources/assets/js/app.js', 'public/js')
	.js('resources/assets/js/season-sort.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
