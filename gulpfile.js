var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var useref = require('gulp-useref');
var uglify = require('gulp-uglify');
// var gulpIf = require('gulp-if');
var cssnano = require('gulp-cssnano');
var imagemin = require('gulp-imagemin');
var cache = require('gulp-cache');
var handlebars = require('gulp-compile-handlebars');
var rename = require('gulp-rename');
var del = require('del');
var runSequence = require('gulp4-run-sequence');
var stripCode = require('gulp-strip-code');

// Development Tasks 
// -----------------

/* Start browserSync server
gulp.task('browserSync', function() {
  browserSync({
    server: {
      baseDir: 'base-html/'
    }
  })
})
*/



gulp.task('html', () => {
  return gulp.src('./src/pages/*.hbs')
    .pipe(handlebars({}, {
      ignorePartials: true,
      batch: ['./src/partials']
    }))
    .pipe(stripCode({
      start_comment: "php-code",
      end_comment: "end-php-code"
    }))
    .pipe(rename({
      extname: '.html'
    }))
    .pipe(gulp.dest('./dist'));
});

gulp.task('php', () => {
  return gulp.src('./src/pages/*.hbs')
    .pipe(handlebars({}, {
      ignorePartials: true,
      batch: ['./src/partials']
    }))
    .pipe(rename({
      extname: '.php'
    }))
    .pipe(gulp.dest('./dist'));
});


gulp.task('sass', function() {
  return gulp.src('assets/scss/**/*.scss') // Gets all files ending with .scss in app/scss and children dirs
    .pipe(sass({
      outputStyle: 'compressed',
      compass: true,
      bundleExec: true,
      sourcemap: true,
      sourcemapPath: './'
    }).on('error', sass.logError)) // Passes it through a gulp-sass, log errors to console
    .pipe(gulp.dest('assets/css')) // Outputs it in the css folder
    .pipe(browserSync.reload({ // Reloading with Browser Sync
      stream: true
    }));
})

// Watchers
gulp.task('watch', function() {
  gulp.watch('assets/scss/**/*.scss', { usePolling: true }, gulp.series('sass'));
  gulp.watch('base-html/*.html', browserSync.reload);
  // gulp.watch('app/js/**/*.js', browserSync.reload);
})

// Optimization Tasks 
// ------------------

// Optimizing CSS and JavaScript 
gulp.task('useref', function() {

  return gulp.src('base-html/homepage/*.html')
    .pipe(useref())
    // .pipe(gulpIf('*.js', uglify()))
    .pipe(gulpIf('*.css', cssnano()))
    .pipe(gulp.dest('dist'));
});

// Optimizing Images 
/*
gulp.task('images', function() {
  return gulp.src('assets/images/*.+(png|jpg|jpeg|gif|svg)')
    // Caching images that ran through imagemin
    .pipe(cache(imagemin({
      interlaced: true,
    })))
    .pipe(gulp.dest('dist/images'))
});

// Copying fonts 
gulp.task('fonts', function() {
  return gulp.src('assets/fonts/*')
    .pipe(gulp.dest('dist/fonts'))
})

// Cleaning 
gulp.task('clean', function() {
  return del.sync('dist').then(function(cb) {
    return cache.clearAll(cb);
  });
})

gulp.task('clean:dist', function() {
  return del.sync(['dist/*', '!dist/images', '!dist/images/*']);
});
*/

// Build Sequences
// ---------------

gulp.task('default', function(callback) {
  runSequence(['sass', 'browserSync'], 'watch',
    callback
  )
})

gulp.task('build', function(callback) {
  runSequence(
    'clean:dist',
    'sass',
    // ['useref', 'images', 'fonts'],
    ['useref'],
    callback
  )
})
