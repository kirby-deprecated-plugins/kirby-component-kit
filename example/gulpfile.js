var gulp = require('gulp');
var concat = require('gulp-concat');
var notify = require('gulp-notify');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');

// CSS
gulp.task('css', function() {
    return gulp.src([
        'assets/css/global.scss',
        'site/components/**/*.scss'
        ])
        .pipe(concat('style.min.scss'))
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('assets/css'))
        .pipe(notify("CSS generated!"));
});

// JS
gulp.task('js', function() {
    gulp.src('site/components/**/*.js')
        .pipe(concat('script.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'))
        .pipe(notify("JS generated!"));
});

gulp.task('default', function() {
    gulp.watch('assets/css/global.scss', ['css']);
    gulp.watch('site/components/**/*.scss', ['css']);
    gulp.watch('site/components/**/*.js',   ['js' ]);
});