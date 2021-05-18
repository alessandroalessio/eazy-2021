/**
 * Defined Variable
 */
var src = 'src';
var dist = 'build';
var sassOpt = {
    errLogToConsole: true,
    outputStyle: 'compressed'
}

/**
 * Requirement
 */
var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');  
var rename = require('gulp-rename');  
var uglify = require('gulp-uglify'); 
var imagemin = require('gulp-imagemin');

/**
 * Sass task Compile
 */
gulp.task('style', function(done) {
    gulp.src( src + '/sass/style.scss')
        .pipe(sass(sassOpt).on('error', sass.logError))
        .pipe(gulp.dest('./'));
    done();
});
gulp.task('style-page', function(done) {
    gulp.src( src + '/sass/page-template/*.scss')
        .pipe(sass(sassOpt).on('error', sass.logError))
        .pipe(gulp.dest(dist + '/css/pages/'));
    done();
});
gulp.task('style-loop', function(done) {
    gulp.src( src + '/sass/loop/*.scss')
        .pipe(sass(sassOpt).on('error', sass.logError))
        .pipe(gulp.dest(dist + '/css/loop/'));
    done();
});

gulp.task('styles:watch', function(done) {
    gulp.watch( src + '/sass/**/*.scss', gulp.series('style'));
    gulp.watch( src + '/sass/page-template/*.scss', gulp.series('style-page'));
    gulp.watch( src + '/sass/loop/*.scss', gulp.series('style-loop'));
    done();
});

/**
 * Javascript Packages task Compile
*/
gulp.task('script-package', function(done) {
    gulp.src( src + '/js/package/**/*.js')
        .pipe( concat('package.js') )
        .pipe(gulp.dest( dist + '/js/'))
        .pipe(rename('package.min.js'))
        // .pipe(uglify())
        .pipe(gulp.dest( dist + '/js/'));
    done();
});

gulp.task('script-package:watch', function(done) {
    gulp.watch( src + '/js/package/**/*.js', gulp.series('script-package'));
    done();
});

/**
 * Javascript Theme task Compile
 */
gulp.task('script-theme', function(done) {
    gulp.src( src + '/js/theme.js')
        .pipe(gulp.dest( dist + '/js/'))
        .pipe(rename('theme.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest( dist + '/js/'));
    done();
});

gulp.task('script-theme:watch', function(done) {
    gulp.watch( src + '/js/theme.js', gulp.series('script-theme'));
    done();
});

/**
 * Image task Compile
 */
gulp.task('images', function (done) {
    return gulp.src( src + '/img/**/*')
        .pipe(imagemin({
            progressive: true
        }))
        .pipe(gulp.dest( dist + '/img/'));
    done();

});

gulp.task('images:watch', function(done) {
    gulp.watch( src + '/img/**/*', gulp.series('images'));
    done();
});

/**
 * Default Task
 */
gulp.task('default', gulp.series('styles:watch', 'script-theme:watch'));