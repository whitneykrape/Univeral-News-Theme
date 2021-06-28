var gulp = require('gulp');

var sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const postcssNormalize = require('postcss-normalize');
var cssimport = require("gulp-cssimport");
var gulpAutoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');

var browserSync = require('browser-sync');
var useref = require('gulp-useref');
var uglify = require('gulp-uglify');
var gulpIf = require('gulp-if');
var cssnano = require('gulp-cssnano');
var imagemin = require('gulp-imagemin');
var cache = require('gulp-cache');
var decomment = require('gulp-decomment');

var handlebars = require('gulp-compile-handlebars');
var rename = require('gulp-rename');
var del = require('del');
var runSequence = require('gulp4-run-sequence');
var stripCode = require('gulp-strip-code');
var fs = require('fs')
var templateData = JSON.parse(fs.readFileSync('./src/content.json'))
var handlebars_helpers = require('./src/js/handlebars.helpers.js');

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
  var templateData = JSON.parse(fs.readFileSync('./src/content.json'))

  return gulp.src('./src/pages/*.hbs')
    .pipe(handlebars(templateData, {
      ignorePartials: true,
      batch: ['./src/partials'],
      handlebars_helpers
    }))
    .pipe(stripCode({
      start_comment: "php-code",
      end_comment: "end-php-code"
    }))
    .pipe(rename({
      extname: '.html'
    }))
    .pipe(gulp.dest('dist'));
});

gulp.task('wordpress', () => {
  return gulp.src([
      './src/pages/wordpress/*.hbs',
      './src/pages/wordpress/content/*.hbs',
      './src/pages/wordpress/header/*.hbs'
      ])
    .pipe(handlebars(templateData, {
      ignorePartials: true,
      batch: ['./src/partials'],
      handlebars_helpers
    }))
    .pipe(stripCode({
      start_comment: "only-html-code",
      end_comment: "end-only-html-code"
    }))
    .pipe(decomment({
      trim: true, 
      safe: true
    }))
    .pipe(rename({
      extname: '.php'
    }))
    .pipe(gulp.dest('./dist/wordpress'))
    .pipe(gulp.dest('./base-wordpress/wordpress/wp-content/themes/blocks-only-theme'));
});

gulp.task('wordpress-blocks-php', () => {
  return gulp.src('./src/pages/wordpress/blocks/*.hbs')
    .pipe(handlebars(templateData, {
      ignorePartials: true,
      batch: ['./src/pages/wordpress/blocks'],
      handlebars_helpers
    }))
    .pipe(rename({
      extname: '.php'
    }))
    .pipe(gulp.dest('./dist/wordpress/blocks'))
    .pipe(gulp.dest('./base-wordpress/wordpress/wp-content/plugins/wooden-blocks'));
});

gulp.task('wordpress-blocks-js', () => {
  return gulp.src('./src/pages/wordpress/blocks/*.js')
    .pipe(gulpIf('*.js', uglify()))
    .pipe(gulp.dest('./dist/wordpress/blocks'))
    .pipe(gulp.dest('./base-wordpress/wordpress/wp-content/plugins/wooden-blocks'));
});


gulp.task('sass', function() {
  return gulp.src('./src/assets/scss/**/*.scss') // Gets all files ending with .scss in app/scss and children dirs
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'compressed',
      compass: true,
      bundleExec: true    
    }))
    .pipe(gulpAutoprefixer())
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./dist/assets/css')) // Outputs it in the css folder
    .pipe(gulp.dest('./base-wordpress/wordpress/wp-content/themes/blocks-only-theme')) // Outputs it in the css folder
    .pipe(browserSync.reload({ // Reloading with Browser Sync
      stream: true
    }));
})

// Watchers
gulp.task('watch', function() {
  gulp.watch('./src/assets/scss/**/*.scss', { usePolling: true }, gulp.series('sass'));
  gulp.watch(['./src/partials/blocks/*.hbs', './src/partials/includes/*.hbs', './src/partials/layouts/*.hbs'], { usePolling: true }, gulp.series('html'));
  gulp.watch(['./src/pages/wordpress/*.hbs'], { usePolling: true }, gulp.series('wordpress'));
  gulp.watch(['./src/pages/wordpress/blocks/*.hbs','./src/pages/wordpress/blocks/*.js'], { usePolling: true }, gulp.series(['wordpress-blocks-php','wordpress-blocks-js']));

  // gulp.watch('app/js/**/*.js', browserSync.reload);
})

// Optimization Tasks 
// ------------------

// Optimizing CSS and JavaScript 
gulp.task('useref', function() {

  return gulp.src('./base-html/homepage/*.html')
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
