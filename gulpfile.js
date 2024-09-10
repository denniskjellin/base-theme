const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const browserSync = require('browser-sync').create();
const purgecss = require('gulp-purgecss');
require('dotenv').config();

// Import Bootstrap styles
const bootstrapSass = 'node_modules/bootstrap/scss/bootstrap.scss';

// Import Bootstrap JavaScript
const bootstrapJs = 'node_modules/bootstrap/dist/js/bootstrap.bundle.js';

// Compile Bootstrap Sass to CSS
gulp.task('bootstrap', function () {
	return gulp.src(bootstrapSass).pipe(sass().on('error', sass.logError)).pipe(concat('style.css')).pipe(gulp.dest('./'));
});

// Compile Bootstrap JavaScript
gulp.task('bootstrap-js', function () {
	return gulp
		.src([bootstrapJs, 'js/scripts/*.js'])
		.pipe(concat('main.js'))
		.pipe(
			terser().on('error', function (e) {
				console.log(e);
			})
		)
		.pipe(gulp.dest('./js'));
});

// Compile custom Sass
gulp.task('styles', function () {
	return gulp.src('sass/*.scss').pipe(sass().on('error', sass.logError)).pipe(gulp.dest('./'));
});

// Purge unused CSS from style.css and create style.min.css
gulp.task('purgecss', function () {
	return gulp
		.src('style.css') // Modify to the path of your main CSS file
		.pipe(
			purgecss({
				content: ['**/*.php'], // Use PHP files as content to scan for used CSS
				// Add any additional options as needed
			})
		)
		.pipe(concat('style.min.css'))
		.pipe(gulp.dest('./'));
});

// Start local development server
gulp.task('server', () => {
	browserSync.init({
		proxy: process.env.PROXY_URL, // Proxy to your local development server
	});
});

// Watch for changes and trigger a reload
gulp.task('watch', () => {
	// Watch for changes in SCSS files and compile them
	gulp.watch('sass/**/*.scss', gulp.series('styles'));

	// Watch for changes in files served by the local development server
	gulp.watch('**/*.php').on('change', browserSync.reload);
	gulp.watch('**/*.html').on('change', browserSync.reload);
	gulp.watch('**/*.css').on('change', browserSync.reload);
	gulp.watch('**/*.js').on('change', browserSync.reload);
	// Add more file types as needed
});



// Define a default task that includes "serve", "purgecss", and other tasks
gulp.task('default', gulp.series('bootstrap', 'bootstrap-js', 'styles', 'purgecss', gulp.parallel('server', 'watch')));
