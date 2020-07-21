var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var useref = require('gulp-useref');
var uglify = require('gulp-uglify');
var gulpIf = require('gulp-if');
var cssnano = require('gulp-cssnano');
var cache = require('gulp-cache');
var runSequence = require('gulp4-run-sequence');

// Start browserSync server
gulp.task('browserSync', function() {
  browserSync({
    server: {
      baseDir: 'base-html/'
    }
  })
})


gulp.task('sass', function() {
  return gulp.src('assets/scss/**/*.scss') 
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('assets/css')) 
    .pipe(browserSync.reload({ 
      stream: true
    }));
})

// Watchers
gulp.task('watch', function() {
  gulp.watch('assets/scss/**/*.scss', ['sass']);
  gulp.watch('base-html/*.html', browserSync.reload);
  // gulp.watch('app/js/**/*.js', browserSync.reload);
})

// Optimizing CSS and JavaScript 
gulp.task('useref', function() {

  return gulp.src('base-html/homepage/*.html')
    .pipe(useref())
    // .pipe(gulpIf('*.js', uglify()))
    .pipe(gulpIf('*.css', cssnano()))
    .pipe(gulp.dest('dist'));
});


gulp.task('default', function(callback) {
  runSequence(['sass', 'browserSync'], 'watch',
    callback
  )
})

gulp.task('build', function(callback) {
  runSequence(
    'clean:dist',
    'sass',
    ['useref'],
    callback
  )
})
