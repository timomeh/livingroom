var gulp = require('gulp')
  , fs = require('fs')
  , path = require('path')
  , sass = require('gulp-sass')
  , autoprefixer = require('gulp-autoprefixer')
  , minifycss = require('gulp-minify-css')
  , rename = require('gulp-rename')
  , livereload = require('gulp-livereload')
  , del = require('del')
  , plumber = require('gulp-plumber')
  , svgstore = require('gulp-svgstore')
  , svgmin = require('gulp-svgmin')
  , jshint = require('gulp-jshint')
  , concat = require('gulp-concat')
  , cheerio = require('gulp-cheerio')
  , uglify = require('gulp-uglify')
  ;


/* SASS Build in Development
============================== */
gulp.task('sass', function() {
  return gulp.src('sass/**/*.scss')
    .pipe(plumber())
    .pipe(sass())
    .pipe(autoprefixer({
      browsers: ['> 1%', 'last 3 version', 'ie 8', 'ie 9', 'Firefox ESR', 'opera 12.1', 'Android 3', 'Android 4']
    }))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('css'))
    .pipe(rename('partial-css.php'))
    .pipe(gulp.dest('./'));
});


/* JavaScript
============================== */
gulp.task('js', function() {
  return gulp.src('js/src/**/*.js')
    .pipe(plumber())
    .pipe(jshint())
    .pipe(concat('script.js'))
    .pipe(gulp.dest('js'))
    .pipe(uglify())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('js'));
});


/* SVG Min & Map
============================== */
gulp.task('svg', function() {
  return gulp.src('img/svg/**/*.svg')
    .pipe(plumber())
    .pipe(svgmin())
    .pipe(svgstore({
      fileName: 'partial-svgmap.php',
      prefix: 'shape-',
      inlineSvg: true
    }))
    .pipe(cheerio(function ($) {
      $('svg').attr('style', 'display:none');
    }))
    .pipe(gulp.dest('./'));
});

/* Watch
============================== */
gulp.task('watch', function() {
  livereload.listen();
  gulp.watch('sass/**/*.scss', ['sass']);
  gulp.watch('css/*.css', livereload.changed);
  gulp.watch('img/svg/*.svg', ['svg']);
  gulp.watch('js/src/**/*.js', ['js']);
});

/* Clean builded files
============================== */
gulp.task('clean', function(cb) {
  del(['css'], cb)
});

/* Default task
============================== */
gulp.task('default', ['clean'], function() {
  gulp.start('sass');
});