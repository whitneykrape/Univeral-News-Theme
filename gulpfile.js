const gulp = require('gulp');

const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const postcssNormalize = require('postcss-normalize');
const cssimport = require("gulp-cssimport");
const gulpAutoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');

const browserSync = require('browser-sync');
const useref = require('gulp-useref');
const terser = require('gulp-terser');
const gulpIf = require('gulp-if');
const cssnano = require('gulp-cssnano');
const imagemin = require('gulp-imagemin');
const cache = require('gulp-cache');

const uncomment = require('gulp-uncomment');

const babel = require('gulp-babel');

const handlebars = require('gulp-compile-handlebars');
const rename = require('gulp-rename');
const del = require('del');
const runSequence = require('gulp4-run-sequence');
const stripCode = require('gulp-strip-code');
const replace = require('gulp-replace');
const fs = require('fs')
const handlebars_helpers = require('./src/js/handlebars.helpers.js');
const twig = require('twig');

const templateData = JSON.parse(fs.readFileSync('./src/demo-content.json'))

// Development Tasks 
// -----------------

/* Start browserSync server*/
gulp.task('browserSync', function() {
  browserSync({
    server: {
      baseDir: 'base-html/'
    }
  })
})


// Start from a hbs that dests into craft, ghost, netlify, wordpress folders
// In being distributed, process hbs into mostly HTML? Does that work or does HTML mostly go to HTML? 
// Problem is, WordPress has a complex interface in their files...
// Others just use templating and hold the interface in their UI. 

// Compile collections to be included
// Need to Write something into the WordPress theme that gets all from inc.
// Wrote part of the includer... Test with live theme
/*
gulp.task('wordpress', () => {
  let templateData = JSON.parse(fs.readFileSync('./src/demo-content.json'))

  return gulp.src('./src/blocks/toblocks/*.hbs')
    // .pipe(handlebars(templateData, {
    //   ignorePartials: true,
    //   batch: ['./src/blocks/toblocks'],
    //   handlebars_helpers
    // }))
    .pipe(stripCode({
      start_comment:  "wordpress-not-start",
      end_comment:    "wordpress-not-end"
    }))
    .pipe(rename({
      extname: '.php'
    }))
    .pipe(gulp.dest('./dist/html/blocks'))
    .pipe(gulp.dest('./base-wordpress/wordpress/wp-content/themes/twentytwentytwo-slimmed/inc/patterns/'))
});
*/

gulp.task('pages-html', () => {
  let templateData = JSON.parse(fs.readFileSync('./src/demo-content.json'))

  return gulp.src('./src/pages/*.hbs')
    .pipe(handlebars(templateData, {
      ignorePartials: true,
      batch: [
        './src/includes',
        './src/blocks'
      ],
      helpers: handlebars_helpers
    }))
    .pipe(stripCode({
      start_comment:  "wordpress-start",
      end_comment:    "wordpress-end"
    }))
    .pipe(stripCode({
      start_comment:  "ghost-start",
      end_comment:    "ghost-end"
    }))
    .pipe(stripCode({
      start_comment:  "craft-start",
      end_comment:    "craft-end"
    }))
    .pipe(stripCode({
      start_comment:  "netlify-start",
      end_comment:    "netlify-end"
    }))
    .pipe(replace( /\/~.*~\//g, '' ))
    .pipe(uncomment({
        removeEmptyLines: true
    }))
    .pipe(rename({
      extname: '.html'
    }))
    .pipe(gulp.dest('./dist/html/pages'))
});

gulp.task('blocks-html', () => {
  let templateData = JSON.parse(fs.readFileSync('./src/demo-content.json'))

  return gulp.src('./src/blocks/*.hbs')
    .pipe(stripCode({
      start_comment:  "ghost-start",
      end_comment:    "ghost-end"
    }))
    .pipe(stripCode({
      start_comment:  "netlify-start",
      end_comment:    "netlify-end"
    }))
    .pipe(stripCode({
      start_comment:  "wordpress-start",
      end_comment:    "wordpress-end"
    }))
    .pipe(stripCode({
      start_comment:  "craft-start",
      end_comment:    "craft-end"
    }))
    .pipe(handlebars(templateData, {
      ignorePartials: true,
      helpers: handlebars_helpers
    }))
    .pipe(uncomment({
        removeEmptyLines: true
    }))
    .pipe(rename({
      extname: '.html'
    }))
    // Build to .js file that, at some point, I"ll figure out how to include. 
    // This should actually use hbs to build full html pages
    // From a series of base blocks that are used around
    // Craft, Ghost, WordPress, so on
    // Then build makes all the blocks these pieces need.
    // Try hbs or other templating engines
    .pipe(gulp.dest('./dist/html/blocks'))
});

/*
gulp.task('ghost', () => {
  let templateData = JSON.parse(fs.readFileSync('./src/demo-content.json'))

  return gulp.src('./src/blocks/toblocks/*.hbs')
    // .pipe(handlebars(templateData, {
    //   ignorePartials: true,
    //   batch: ['./src/blocks/toblocks'],
    //   handlebars_helpers
    // }))
    .pipe(stripCode({
      start_comment:  "wordpress-not-start",
      end_comment:    "wordpress-not-end"
    }))
    .pipe(stripCode({
      start_comment:  "preview-start",
      end_comment:    "preview-end"
    }))
    .pipe(rename({
      extname: '.js'
    }))
    .pipe(gulp.dest('./dist/html/blocks'))
});
*/


// Above is less common? Bundle up whole template?
// Below is the more common run, "build a block and use it..."

gulp.task('blocks-craft', () => {
  // This will change to a catch-all folder of craft blocks
  return gulp.src('./src/blocks/*.hbs')
    // .pipe(handlebars(templateData, {
    //   ignorePartials: true,
    //   batch: ['./src/blocks'],
    //   twig
    // })
    .pipe(stripCode({
      start_comment:  "html-start",
      end_comment:    "html-end"
    }))
    .pipe(stripCode({
      start_comment:  "wordpress-start",
      end_comment:    "wordpress-end"
    }))
    .pipe(stripCode({
      start_comment:  "ghost-start",
      end_comment:    "ghost-end"
    }))
    .pipe(stripCode({
      start_comment:  "hyas-start",
      end_comment:    "hyas-end"
    }))
    .pipe(rename({
      extname: '.twig'
    }))
    .pipe(gulp.dest('./dist/craft/blocks'))
});

gulp.task('blocks-ghost', () => {
  // All the Ghost blocks... So on.
  return gulp.src('./src/blocks/*.hbs')
    /* .pipe(handlebars(templateData, {
      ignorePartials: true,
      batch: ['./src/blocks/ghost-block-article'],
      handlebars_helpers
    })) */
    .pipe(stripCode({
      start_comment:  "html-start",
      end_comment:    "html-end"
    }))
    .pipe(stripCode({
      start_comment:  "wordpress-start",
      end_comment:    "wordpress-end"
    }))
    .pipe(stripCode({
      start_comment:  "craft-start",
      end_comment:    "craft-end"
    }))
    .pipe(stripCode({
      start_comment:  "hyas-start",
      end_comment:    "hyas-end"
    }))
    .pipe(rename({
      extname: '.hbs'
    }))
    .pipe(gulp.dest('./dist/ghost/blocks'))
});

gulp.task('blocks-netlify', () => {
  return gulp.src('./src/blocks/*.hbs')
    /* .pipe(handlebars(templateData, {
      ignorePartials: true,
      batch: ['./src/blocks'],
      handlebars_helpers
    })) */
    .pipe(stripCode({
      start_comment:  "html-start",
      end_comment:    "html-end"
    }))
    .pipe(stripCode({
      start_comment:  "wordpress-start",
      end_comment:    "wordpress-end"
    }))
    .pipe(stripCode({
      start_comment:  "craft-start",
      end_comment:    "craft-end"
    }))
    .pipe(stripCode({
      start_comment:  "ghost-start",
      end_comment:    "ghost-end"
    }))
    .pipe(rename({
      extname: '.html'
    }))
    .pipe(gulp.dest('./dist/netlify/blocks'))
});

// Mostly just moved this...
gulp.task('blocks-wordpress', () => {
  let templateData = JSON.parse(fs.readFileSync('./src/demo-content.json'))

  return gulp.src('./src/blocks/*.hbs')
    // .pipe(handlebars(templateData, {
    //   ignorePartials: true,
    //   batch: ['./src/blocks/toblocks'],
    //   handlebars_helpers
    // }))
    .pipe(stripCode({
      start_comment:  "html-start",
      end_comment:    "html-end"
    }))
    .pipe(stripCode({
      start_comment:  "ghost-start",
      end_comment:    "ghost-end"
    }))
    .pipe(stripCode({
      start_comment:  "craft-start",
      end_comment:    "craft-end"
    }))
    .pipe(stripCode({
      start_comment:  "netlify-start",
      end_comment:    "netlify-end"
    }))
    .pipe(replace( /\/~.*~\//g, '' ))
    .pipe(rename({
      extname: '.php'
    }))
    .pipe(gulp.dest('./dist/wordpress/patterns'))
    .pipe(gulp.dest('./base-wordpress/wordpress/wp-content/themes/blocks-slim/patterns/'))
    // Pull documentation into the WordPress folder 
});

/* Patterns not fully custom blocks.
gulp.task('wordpress-blocks-js', () => {
  return gulp.src('./src/pages/wordpress/blocks/*.js')
    .pipe(gulpIf('*.js', babel()))
    .pipe(gulp.dest('./dist/wordpress/blocks'))
    .pipe(gulp.dest('./base-wordpress/wordpress/wp-content/plugins/wooden-blocks'))
});
// Revist the kind of blocks needed (post) since WP has patterns that work well 
*/

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
    .pipe(gulp.dest('./base-hyas/public/css')) // Outputs it in the css folder
    .pipe(gulp.dest('./base_ghost/content/themes/casper/assets/css')) // Outputs it in the css folder
    .pipe(browserSync.reload({ // Reloading with Browser Sync
      stream: true
    }));
})


gulp.task('js', function() {
  return gulp.src('./src/assets/js/*.js')
    .pipe(gulpIf('*.js', babel()))
    .pipe(gulp.dest('./dist/assets/js'))
})


// Watchers
gulp.task('watch', function() {
  gulp.watch('./src/assets/scss/**/*.scss', { usePolling: true }, gulp.series('sass'));
  gulp.watch('./src/assets/js/*.js', { usePolling: true }, gulp.series('js'));
  gulp.watch(['./src/blocks/*.hbs'], { usePolling: true }, gulp.series.apply(gulp, ['sass','pages-html']));
})

// Optimization Tasks 
// ------------------

// Optimizing CSS and JavaScript 
gulp.task('useref', function() {

  return gulp.src('./base-html/homepage/*.html')
    .pipe(useref())
    // .pipe(gulpIf('*.js', terser()))
    .pipe(gulpIf('*.css', cssnano()))
    .pipe(gulp.dest('dist'));
});

// Optimizing Images 
gulp.task('images', function() {
  return gulp.src('src/assets/img/*.+(png|jpg|jpeg|gif|svg)')
    // Caching images that ran through imagemin
    .pipe(cache(imagemin({
      interlaced: true,
    })))
    .pipe(gulp.dest('dist/assets/img'))
});

// Copying fonts 
gulp.task('fonts', function() {
  return gulp.src('assets/fonts/*')
    .pipe(gulp.dest('dist/assets/fonts'))
})

/*
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

gulp.task('all', function(callback) {
  runSequence(['sass','pages-html'], 'watch',
    callback
  )
})

gulp.task('blocks', function(callback) {
  runSequence(['sass','blocks-craft', 'blocks-ghost', 'blocks-netlify', 'blocks-wordpress'], 'watch',
    callback
  )
})

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
