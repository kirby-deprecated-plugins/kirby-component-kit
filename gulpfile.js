var gulp = require('gulp');

var autoprefixer = require('gulp-autoprefixer');
var cssmin = require('gulp-cssmin');
var notify = require('gulp-notify');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

// CSS
gulp.task('css', function() {
    return gulp.src([
        'assets/css/src/**/*.scss',
        'tool/snippets/**/*.scss'
        ])
        .pipe(concat('style.min.scss'))
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(cssmin())
        .pipe(gulp.dest('assets/css/dist'))
        .pipe(notify("CSS generated!"));
});

// JS
gulp.task('js', function() {
    gulp.src(
        'tool/snippets/**/*.js'
        )
        .pipe(concat('script.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'))
        .pipe(notify("JS generated!"));
});

gulp.task('default', function() {
    gulp.watch([
        'assets/css/src/**/*.scss',
        'tool/snippets/**/*.scss'
        ],
        ['css']);
    gulp.watch(
        'tool/snippets/**/*.js',
        ['js']);
});