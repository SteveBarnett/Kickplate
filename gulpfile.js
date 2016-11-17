var gulp = require('gulp'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    sourcemaps = require('gulp-sourcemaps');

var sasssrc = './src/css/*.scss',
    cssdist = './css';

gulp.task('sass', function () {
  return gulp.src(sasssrc)
      .pipe(sourcemaps.init())
      .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
      .pipe(rename({
        extname: '.min.css'
      }))
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest(cssdist))
})

gulp.task('default', function () {
  gulp.watch(sasssrc, ['sass'])
})
