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
    rename = require('gulp-rename'),
    livereload = require('gulp-livereload');


var dirs = {
    'views'             : './app/views/',
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
//gulp.task('clean', function(){
//    return del([
//            dirs.tempCss        + '*.css',
//            dirs.publicCss      + '*.css',
//            dirs.publicJs       + '*.js',
//            dirs.publicFonts    + '**.*',
//            dirs.publicImages   + '**.*'
//        ]
//        ,function(err, deletedFiles){
//           gutil.log('Files deleted:', deletedFiles.join('\n'));
//        });
//});

gulp.task('cleanSass', function(){
   return del(dirs.publicCss + 'admin.min.css', function(err, deletedFile){
       gutil.log('Files deleted:', deletedFile);
   });
});

/*
* Convert sass file to css
* Move it in .tmp/css/ directory
*/
gulp.task('sass', ['cleanSass'], function () {
    return gulp.src(dirs.assetsSass + '*.scss')
        .pipe(sass())
        .pipe(autoprefixer('last 10 version'))
        .pipe(minifyCss())
        .pipe(rename('admin.min.css'))
        .pipe(gulp.dest(dirs.publicCss))
        .pipe(livereload());
});

gulp.task('cleanVendorCss', function () {
    return del(dirs.publicCss + 'vendor.min.css', function (err, deletedFile) {
        gutil.log('Files deleted:', deletedFile);
    });
});

/*
* Concat and Minify vendor css files
*/
gulp.task('vendor-css', ['cleanVendorCss'], function(){
    return gulp.src([
        dirs.assetsCss  + 'jquery-ui-1.10.1.custom.css',
        dirs.assetsCss  + 'bucket-ico-fonts.css',
        dirs.vendor     + 'fontawesome/css/font-awesome.css',
        dirs.vendor     + 'select2/select2.css',
        dirs.vendor     + 'bootstrap/dist/css/bootstrap.css',
        dirs.vendor     + 'select2-bootstrap-css/select2-bootstrap.css',
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
        dirs.assetsCss  + 'real-estate-listing.css',
        dirs.vendor     + 'iCheck/skins/flat/green.css',
        dirs.vendor     + 'iCheck/skins/flat/grey.css',
        dirs.assetsCss  + 'style.css',
        dirs.assetsCss  + 'style-responsive.css',
        dirs.vendor + 'bootstrap-3-datepicker/dist/css/bootstrap-datepicker3.css'
    ])
        .pipe(concat('vendor.min.css'))
        .pipe(minifyCss({processImport: false}))
        .pipe(gulp.dest(dirs.publicCss))
        .pipe(livereload());
});

gulp.task('cleanJs', function () {
    return del(dirs.publicJs + 'admin.min.js', function (err, deletedFile) {
        gutil.log('Files deleted:', deletedFile);
    });
});

/*
 * Concat and uglify admin js files
 */
gulp.task('js', ['cleanJs'], function () {
    return gulp.src([
        dirs.assetsJs + 'select2-init.js',
        dirs.assetsJs + 'date-init.js',
        dirs.assetsJs + 'scripts.js'
    ])
        .pipe(concat('admin.min.js'))
        .pipe(uglify({mangle: false}))
        .pipe(gulp.dest(dirs.publicJs))
        .pipe(livereload())
        .on('error', gutil.log);
});

gulp.task('cleanVendorJs', function () {
    return del(dirs.publicJs + 'vendor.min.js', function (err, deletedFile) {
        gutil.log('Files deleted:', deletedFile);
    });
});

/*
* Concat and uglify vendor js files
*/
gulp.task('vendor-js', ['cleanVendorJs'], function () {
    return gulp.src([
        dirs.assetsJs   + 'constants.js',
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
        dirs.assetsJs   + 'jasny-bootstrap.min.js',
        dirs.vendor     + 'gmap3/dist/gmap3.js',
        dirs.vendor     + 'select2/select2.js',
        dirs.vendor     + 'iCheck/iCheck.js',
        dirs.vendor     + 'bootstrap-3-datepicker/dist/js/bootstrap-datepicker.js'
    ])
            .pipe(concat('vendor.min.js'))
            .pipe(uglify({mangle: false}))
            .pipe(gulp.dest(dirs.publicJs))
            .pipe(livereload())
            .on('error', gutil.log);
});

gulp.task('cleanFonts', function () {
    return del(dirs.publicFonts + '**.*', function (err, deletedFile) {
        gutil.log('Files deleted:', deletedFile);
    });
});

/*
 * Copy fonts to public directory
 */
gulp.task('copy-fonts', ['cleanFonts'], function () {
    return gulp.src([
        dirs.vendor + 'fontawesome/fonts/**.*',
        dirs.assetsFonts + '**.*'
    ])
        .pipe(gulp.dest(dirs.publicFonts));
});

gulp.task('cleanImages', function () {
    return del(dirs.publicImages + '**.*', function (err, deletedFile) {
        gutil.log('Files deleted:', deletedFile);
    });
});

gulp.task('copy-images', ['cleanImages'], function () {
    gulp.src([dirs.vendor + 'iCheck/skins/flat/green.png',
              dirs.vendor + 'iCheck/skins/flat/green@2x.png',
              dirs.vendor + 'iCheck/skins/flat/grey.png',
              dirs.vendor + 'iCheck/skins/flat/grey@2x.png'])
        .pipe(gulp.dest(dirs.publicCss));

    return gulp.src([
        dirs.assetsImages + '**/*.*'
    ])
        .pipe(gulp.dest(dirs.publicImages))
        .pipe(livereload());
});

//gulp.task('gulpfile',function(){
//   return gulp.src('./Gulpfile.js')
//       .pipe(livereload());
//});

gulp.task('views', function(){
   return gulp.src([dirs.views + '**/*.*', dirs.views + '**/**/*.*'])
       .pipe(livereload());
});

gulp.task('watch', ['sass', 'vendor-css', 'copy-images'], function () {

    livereload.listen();

    gulp.watch(dirs.assetsSass + '*.scss', ['sass']);

    gulp.watch(dirs.assetsCss + '*.css', ['vendor-css']);

    gulp.watch([dirs.assetsJs + 'select2-init.js', dirs.assetsJs + 'date-init.js', dirs.assetsJs + 'scripts.js'], ['js']);

    gulp.watch([dirs.assetsJs + '*.js', '!' + dirs.assetsJs + 'select2-init.js', '!' + dirs.assetsJs + 'date-init.js', '!' + dirs.assetsJs + 'scripts.js'], ['vendor-js']);

    gulp.watch(dirs.assetsImages + '**/*.*', ['copy-images']);

    gulp.watch([dirs.views + '**/*.*', dirs.views + '**/**/*.*'], ['views']);
    //gulp.watch('./Gulpfile.js', ['compile']);
});

gulp.task('compile', ['sass', 'vendor-css', 'js', 'vendor-js']);

gulp.task('copy', ['copy-fonts', 'copy-images']);

gulp.task('default', ['compile', 'copy', 'watch']);



