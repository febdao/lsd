'use strict';

// *************************
//
// Run 'gulp' to watch directory for changes for images, fonts icons, Sass, etc.
// Or for full site testing run 'gulp test'
//
// *************************


// Include gulp.
const gulp = require('gulp');

// Include plug-ins.
const jshint = require('gulp-jshint');
const imagemin = require('gulp-imagemin');
const compass = require('gulp-sass');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const iconfont = require('gulp-iconfont');
const iconfontCss = require('gulp-iconfont-css');
const iconfontTemplate = require('gulp-iconfont-template');
const pa11y = require('gulp-pa11y');
const w3cValidation = require('gulp-w3c-html-validation');
const casperJs = require('gulp-casperjs');
const realFavicon = require('gulp-real-favicon');
const fs = require('fs'); // Used by check-for-favicon-update.
const plumber = require('gulp-plumber'); // For error handling.
const gutil = require('gulp-util'); // For error handling.
const postcss = require('gulp-postcss');
const cssNano = require('cssnano');
const atImport = require('postcss-import');
const autoprefixer = require('autoprefixer');
const rename = require('gulp-rename');
const browserSync = require('browser-sync').create();

// Project vars
// URL to test locally.
const localSiteURL = 'http://localhost:3000/';
// Name of the icon font.
const fontName = 'govcmsui-icons';
// Favicon related settings.
const faviconColour = '#ffffff';
const faviconBackgroundColour = '#384249';



// ********************************************************************************************************************************************


// Error Handling to stop file watching from dying on an error (ie: Sass compiling).
var onError = function(err) {
  gutil.beep();
  console.log(err);
};

// **********************

// Compile the Sass.
gulp.task('styles', function() {
  // Register the PostCSS plugins.
  var postcssPlugins = [
    atImport,
    autoprefixer,
    cssNano,
  ];
  // The actual task.
  gulp.src('./sass/**/*.scss')
    // Error handling
    .pipe(plumber({
      errorHandler: onError
    }))
    // Compile the Sass code.
    .pipe(compass({
      sass: './sass'
    }))
    // If there's more than one css file outputted, merge them into one.
    // .pipe(concat('./styles.css'))
    // Optimise the CSS.
    .pipe(postcss(postcssPlugins))
    // Output to the css folder.
    .pipe(gulp.dest('./css/'))
    // BrowserSync
    // Note: you need to disable Drupal caching and concatenation or this won't do any good.
    .pipe(browserSync.stream({
      match: '**/*.css'
    }));
});
// ********************************************************************************************************************************************

// Default gulp task.
gulp.task('default', ['styles']);


// Watch changes.
gulp.task('watch', ['styles'], function() {
  // Watch for Sass changes.
  gulp.watch('./sass/**/*.scss', function() {
    gulp.start('styles');
  });
});
