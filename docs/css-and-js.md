## CSS and JS

To use css and javascript in a component/modular way, you need a build process of some kind.

**You need a build process that does the following (or similar):**

- Compress and merge the css files into `assets/css/style.min.css`.
- Compress and merge the js files into `assets/js/script.min.js`.

In the example below [Gulp](https://gulpjs.com/) is used, but you can use [Grunt](https://gruntjs.com/) or something else if you want.

### Install gulp

To install Gulp you first need to install [Node.js](https://nodejs.org/en/). Then in the terminal, in the Kirby root you can run these commands:

```text
npm install --save-dev gulp
npm install --save-dev gulp-concat
npm install --save-dev gulp-notify
npm install --save-dev gulp-sass
npm install --save-dev gulp-uglify
```

### gulpfile.js

The gulpfile in this example should be placed in the Kirby root. It works on the default setup. If you change the folder structure, you need to change the `gulpfile.js` accordingly.

```js
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
```

It's also available at [example/gulpfile.js](example/gulpfile.js).
