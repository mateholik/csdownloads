const gulp = require('gulp');
const sass = require('gulp-sass');
var postcss = require('gulp-postcss');
const cleanCSS = require('gulp-clean-css');
const uncss = require('gulp-uncss');

gulp.task('css', function() {
	return gulp.src('./public/app/example.css')
		.pipe(purify(['./public/app/**/*.js', './public/**/*.html']))
		.pipe(gulp.dest('./dist/'));
});

function style() {
	var tailwindcss = require('tailwindcss');
	return gulp.src('custom-assets/scss//**/*.scss')
		.pipe(sass({
			includePaths: ['node_modules']
		}))
		.pipe(postcss([
			tailwindcss('./tailwind.js'),
			require('autoprefixer'),
		]))
		// .pipe(purify(['./public/app/**/*.js', './public/**/*.html']))
		// .pipe(cleanCSS())
		.pipe(gulp.dest('.'))
}

gulp.task('optimize', function() {
	return gulp.src('./style.css')
		.pipe(uncss({
			ignore: ['.is-active', '.mob-nav--active'],
			html: ['http://localhost:8888/csdownloads/'],
		}))
		.pipe(cleanCSS())
		.pipe(gulp.dest('./'))
});
//after optimizing, add burder css to main css

function js() {
	return gulp.src('custom-assets/js/**/*.js')
		.pipe(gulp.dest('custom-assets/ready'))
}


function watch() {
	gulp.watch('custom-assets/scss/**/*.scss', style);
	gulp.watch('custom-assets/js/**/*.js', js);
}

exports.style = style
exports.watch = watch
