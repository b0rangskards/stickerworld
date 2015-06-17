var gulp = require('gulp'),
    del = require('del'),
    notify = require('gulp-notify'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifyCss = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    jshint = require('gulp-jshint'),
    copy = require('gulp-copy'),
    rename = require('gulp-rename');


var dirs = {
    'assets'            : './app/assets/',
    'assetsSass'        : './app/assets/sass/',
    'assetsCss'         : './app/assets/css/',
    'assetsJs'          : './app/assets/js/',
    'assetsFonts'       : './app/assets/fonts/',
    'assetsImages'      : './app/assets/images/',
    'tempCss'           : './app/assets/.tmp/css/',
    'vendor'            : './app/assets/vendor/',
    'publicCss'         : './public/css/',
    'publicJs'          : './public/js/',
    'publicFonts'       : './public/fonts/',
    'publicImages'      : './public/images/'
};

/* Clean Files in .tmp and public directory */
gulp.task('clean', function(){
    return del([
            dirs.tempCss        + '*.css',
            dirs.publicCss      + '*.css',
            dirs.publicJs       + '*.js',
            dirs.publicFonts    + '**.*',
            dirs.publicImages   + '**.*'
        ]
        ,function(err, deletedFiles){
           gutil.log('Files deleted:', deletedFiles.join('\n'));
        });
});

/*
* Convert sass file to css
* Move it in .tmp/css/ directory
*/
gulp.task('sass', [], function () {
    return gulp.src(dirs.assetsSass + '*.scss')
        .pipe(sass())
        .pipe(autoprefixer('last 10 version'))
        .pipe(minifyCss())
        .pipe(rename('admin.min.css'))
        .pipe(gulp.dest(dirs.publicCss));
});

/*
* Concat and Minify vendor css files
*/
gulp.task('vendor-css', ['clean'], function(){
    return gulp.src([
        dirs.assetsCss  + 'jquery-ui-1.10.1.custom.css',
        dirs.assetsCss  + 'bucket-ico-fonts.css',
        dirs.vendor     + 'fontawesome/css/font-awesome.css',
        dirs.vendor     + 'bootstrap/dist/css/bootstrap.css',
        dirs.assetsCss  + 'bootstrap-editable.css',
        dirs.assetsCss  + 'jasny-bootstrap.min.css',
        dirs.assetsCss  + 'demo_table.css',
        dirs.assetsCss  + 'dt_bootstrap.css',
        dirs.assetsCss  + 'dataTables.tableTools.css',
        dirs.assetsCss  + 'bootstrap-reset.css',
        dirs.assetsCss  + 'blankon-layouts.css',
        dirs.vendor     + 'pnotify/pnotify.core.css',
        dirs.vendor     + 'semantic-ui-loader/loader.min.css',
        dirs.vendor     + 'sweetalert/dist/sweetalert.css',
        dirs.assetsCss  + 'style.css',
        dirs.assetsCss  + 'style-responsive.css'
    ])
        .pipe(concat('vendor.min.css'))
        .pipe(minifyCss({processImport: false}))
        .pipe(gulp.dest(dirs.publicCss));
});

/*
 * Concat and uglify admin js files
 */
gulp.task('js', [], function () {
    return gulp.src([
        dirs.assetsJs + 'scripts.js'
    ])
        .pipe(uglify({mangle: false}))
        .pipe(rename('admin.min.js'))
        .pipe(gulp.dest(dirs.publicJs))
        .on('error', gutil.log);
});

/*
* Concat and uglify vendor js files
*/
gulp.task('vendor-js', ['clean'], function () {
    return gulp.src([
        dirs.vendor     + 'jquery/dist/jquery.js',
        dirs.assetsJs   + 'jquery-ui-1.10.1.custom.min.js',
        dirs.vendor     + 'bootstrap/dist/js/bootstrap.js',
        dirs.assetsJs   + 'bootstrap-editable.min.js',
        dirs.assetsJs   + 'jquery.dcjqaccordion.2.7.js',
        dirs.assetsJs   + 'jquery.scrollto.min.js',
        dirs.assetsJs   + 'jquery.slimscroll.js',
        dirs.assetsJs   + 'jquery.nicescroll.js',
        dirs.assetsJs   + 'jquery.scrollto.js',
        dirs.assetsJs   + 'jquery.datatables.js',
        dirs.assetsJs   + 'dataTables.tableTools.js',
        dirs.assetsJs   + 'dt_bootstrap.js',
        dirs.vendor     + 'sweetalert/dist/sweetalert.min.js',
        dirs.vendor     + 'pnotify/pnotify.core.js',
        dirs.assetsJs   + 'jasny-bootstrap.min.js'
    ])
            .pipe(concat('vendor.min.js'))
            .pipe(uglify({mangle: false}))
            .pipe(gulp.dest(dirs.publicJs))
            .on('error', gutil.log);
});

/*
 * Copy fonts to public directory
 */
gulp.task('copy-fonts', ['clean'], function () {
    return gulp.src([
        dirs.vendor + 'fontawesome/fonts/**.*',
        dirs.assetsFonts + '**.*'
    ])
        .pipe(gulp.dest(dirs.publicFonts));
});

gulp.task('copy-images', ['clean'], function () {
    return gulp.src([
        dirs.assetsImages + '**/*.*'
    ])
        .pipe(gulp.dest(dirs.publicImages));
});

gulp.task('default', ['clean', 'sass', 'vendor-css', 'js', 'vendor-js', 'copy-fonts', 'copy-images']);



