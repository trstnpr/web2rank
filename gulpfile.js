var gulp = require('gulp');

var sass = require('gulp-sass');
var minifyCSS = require('gulp-csso');
gulp.task('style', function() {
	return gulp.src('resources/sass/**/*.scss')  // Gets all files ending with .scss in app/scss
		.pipe(sass()) // Process the sass/scss files
		.pipe(minifyCSS()) // Minify output
		.pipe(gulp.dest('build/css')) // Output Directory
});

gulp.task('font', function() {
	return gulp.src([
		'resources/fonts/**/*',
		'bower_components/font-awesome/fonts/**/*',
		'bower_components/bootstrap-sass/assets/fonts/**/*'
		])
		.pipe(gulp.dest('build/fonts'))
})

var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
gulp.task('master-script', function() {
	gulp.src([
		'bower_components/jquery/dist/jquery.js',
		'bower_components/jquery-ui/jquery-ui.js',
		'bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
		'bower_components/slick-carousel/slick/slick.js',
		'bower_components/parallax.js/parallax.js',
		'bower_components/lity/dist/lity.js',
		'bower_components/alertify.js/lib/alertify.js',
		'bower_components/simpleWeather/jquery.simpleWeather.js',
		'bower_components/typeahead.js/dist/typeahead.bundle.js',
		'bower_components/bootstrap-select/dist/js/bootstrap-select.js',
		'bower_components/datatables.net/js/jquery.dataTables.js',
		'bower_components/datatables.net-bs/js/dataTables.bootstrap.js',
		'bower_components/datatables.net-responsive/js/dataTables.responsive.js',
		'bower_components/lity/dist/lity.js',
		'resources/js/FuzzySearch.js',
		'resources/js/popper.js',
		'resources/js/bootstrap-tagsinput.min.js',
		'resources/js/jquery.touchSwipe.min.js'
		])
	    .pipe(concat('master-scripts.js'))
	    .pipe(uglify())
	    .pipe(gulp.dest('build/js'))
});

gulp.task('custom-script', function() {
	gulp.src('resources/js/**/*.js')
	    // .pipe(concat('custom-scripts.js'))
	    .pipe(uglify())
	    .pipe(gulp.dest('build/js'))
});

var imagemin = require('gulp-imagemin');
gulp.task('images', function() {
	return gulp.src('resources/images/**/*.+(png|jpg|jpeg|gif|svg)')
	.pipe(imagemin({
		interlaced: true // Setting interlaced to true
	}))
	.pipe(gulp.dest('build/images'))
});


gulp.task('watch', ['style', 'custom-script', 'images'], function() {
	gulp.watch('resources/sass/**/*.scss', ['style']);
	gulp.watch('resources/images/**/*.+(png|jpg|jpeg|gif|svg)', ['images']);
	gulp.watch('resources/js/**/*.js', ['custom-script']);
});

gulp.task('run', ['style', 'font', 'master-script', 'custom-script', 'images', 'watch']);