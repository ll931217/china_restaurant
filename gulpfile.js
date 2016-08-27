var gulp    = require('gulp');
var pug     = require('gulp-pug');
var sass    = require('gulp-sass');
var prefix  = require('gulp-autoprefixer');
var clean   = require('gulp-clean-css');
var pretty  = require('gulp-html-prettify');

gulp.task('pug', function() {
  return gulp.src(['_pugFiles/**/[^_]*.pug'])
    .pipe(pug())
    .pipe(pretty({indent_char: " ", indent_size: 2}))
    .pipe(gulp.dest('./public'));
});

gulp.task('sass', function() {
  return gulp.src('_sassFiles/**/*.*')
    .pipe(sass())
    .pipe(prefix(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
    .pipe(clean({'compatibility': 'ie8'}))
    .pipe(gulp.dest('./public/css'));
});

gulp.task('watch', function() {
  gulp.watch('_pugFiles/**', ['pug']);
  gulp.watch('_sassFiles/**', ['sass']);
});

gulp.task('default', ['watch']);
