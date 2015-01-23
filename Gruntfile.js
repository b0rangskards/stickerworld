'use strict';

module.exports = function (grunt) {

    // Load grunt tasks automatically
    require('load-grunt-tasks')(grunt);

    // Time how long tasks take. Can help when optimizing build times
    require('time-grunt')(grunt);

    // Project configuration
    grunt.initConfig({
        // Metadata
        pkg: grunt.file.readJSON('package.json'),
        laravel: {
            // Configurable paths
            assets: 'app/assets',
            bower: 'app/assets/components/bower',
            tmp: 'app/assets/.tmp',
            bucketadmin: 'app/assets/packages/bucketadmin_1.4',
            dest: 'public',
            views: 'app/views'
        },
        // Empties folders to start fresh
        clean: {
            files: {
                dot: true,
                src: [
                    '<%= laravel.tmp %>/images/**/*',
                    '<%= laravel.tmp %>/scripts/**/*',
                    '<%= laravel.tmp %>/scripts/*',
                    '<%= laravel.tmp %>/styles/**/*',
                    '<%= laravel.dest %>/fonts/*',
                    '<%= laravel.dest %>/images/**/*',
                    '<%= laravel.dest %>/scripts/*',
                    '<%= laravel.dest %>/styles/*'
                ]
            }
        },
        jshint: {
            options: {
                jshintrc: ".jshintrc"
            },
            gruntfile: {
                src: 'gruntfile.js'
            }
            //target: {
            //    src: ['<%= laravel.assets %>/scripts/*.js']
            //}
        },
        copy: {
            imagesbucket: {
                files: [{
                    expand: true,
                    cwd: '<%= laravel.bucketadmin %>/images',
                    dest: '<%= laravel.tmp %>/images/bucketadmin',
                    src: [
                        '**/*.{ico,png,jpg,jpeg}',
                        '*.{ico,png,jpg,jpeg}'
                    ]
                }]
            },
            fonts: {
                files: [{
                    expand: true,
                    dot: true,
                    cwd: '<%= laravel.bower %>/fontawesome/fonts',
                    dest: '<%= laravel.dest %>/fonts',
                    src: [
                        '*.*'
                    ]
                },
                {
                    expand: true,
                    dot: true,
                    cwd: '<%= laravel.bucketadmin %>/bucket-ico-fonts',
                    dest: '<%= laravel.dest %>/fonts',
                    src: [
                    '*.*'
                    ]
                }]
            }
        },
        concat: {
            options: {
                stripBanners: false
            },
            js: {
                src: [
                    '<%= laravel.bower %>/jquery/dist/jquery.min.js',
                    '<%= laravel.bucketadmin %>/js/jquery-ui/jquery-ui-1.10.1.custom.min.js',
                    '<%= laravel.bower %>/bootstrap/dist/js/bootstrap.min.js',
                    '<%= laravel.bucketadmin %>/js/jquery.dcjqaccordion.2.7.js',
                    '<%= laravel.bucketadmin %>/js/jquery.scrollTo.min.js',
                    '<%= laravel.bucketadmin %>/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js',
                    '<%= laravel.bucketadmin %>/js/jquery.nicescroll.js',
                    '<%= laravel.bucketadmin %>/js/skycons/skycons.js',
                    '<%= laravel.bucketadmin %>/js/jquery.scrollTo/jquery.scrollTo.js',
                    '<%= laravel.bucketadmin %>/js/jquery.easing.min.js',
                    '<%= laravel.bucketadmin %>/js/underscore.min.js',
                    '<%= laravel.bucketadmin %>/js/calendar/moment-2.2.1.js',
                    '<%= laravel.bucketadmin %>/js/dashboard.js',
                    '<%= laravel.bucketadmin %>/js/jquery.customSelect.min.js',
                    '<%= laravel.bucketadmin %>/js/scripts.js'
                ],
                dest: '<%= laravel.tmp %>/scripts/concat.js'
            },
            css: {
                src: [
                    '<%= laravel.bower %>/bootstrap/dist/css/bootstrap.min.css',
                    '<%= laravel.bucketadmin %>/js/jquery-ui/jquery-ui-1.10.1.custom.min.css',
                    '<%= laravel.bower %>/fontawesome/css/font-awesome.min.css',
                    '<%= laravel.bucketadmin %>/css/style-responsive.css',
                    '<%= laravel.bucketadmin %>/css/style.css',
                    '<%= laravel.assets %>/styles/*'
                ],
                dest: '<%= laravel.tmp %>/styles/concat.css'
            }
        },
        uglify: {
            options: {
                mangle: false,
                compress: true,
                preserveComments: "some"
            },
            dist: {
                src: '<%= laravel.tmp %>/scripts/concat.js',
                dest: '<%= laravel.dest %>/scripts/vendor.min.js'
            }
        },
        // Concatenate and minify CSS
        cssmin: {
            dist: {
                files: [{
                    '<%= laravel.dest %>/styles/vendor.min.css': [ '<%= laravel.tmp %>/styles/concat.css' ]
                }]
            }
        },
        // The following *-min tasks produce minified files in the dist folder
        imagemin: {
            bucketadmin: {
                files: [{
                    expand: true,
                    cwd: '<%= laravel.tmp %>/images/bucketadmin',
                    src: '{,*/}*.{gif,jpeg,jpg,png}',
                    dest: '<%= laravel.dest %>/images/bucketadmin'
                }]
            }
        },
        // Run some tasks in parallel to speed up build process
        concurrent: {
            dist: [
                'imagemin:bucketadmin'
            ]
        }
    });

    // Default task
    grunt.registerTask('default', [
        'jshint',
        'clean',
        'copy:imagesbucket',
        'concurrent:dist',
        'concat',
        'uglify',
        'cssmin',
        'copy:fonts'
        //'watch'
    ]);
};