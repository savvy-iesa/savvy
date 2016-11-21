'use strict';
var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');

gulp.task('serve', ['sass'], function() {

    browserSync.init({
        server: "./",
        port: 15000
    });

    gulp.watch("savvy/scss/*.scss", ['sass']);
    gulp.watch("savvy/*.html").on('change', browserSync.reload);
});

gulp.task('sass', function() {
    return gulp.src("savvy/sass/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("app/css"))
        .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);